<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TutorialCreateRequest;
use App\Http\Requests\TutorialUpdateRequest;
use App\Repositories\TutorialRepository;
use App\Validators\TutorialValidator;
use App\Services\TutorialService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepository;


class TutorialsController extends Controller{

    /**
     * @var TutorialRepository
     */
    protected $repository;

    /**
     * @var TutorialValidator
     */
    protected $validator;
    protected $service;

    public function __construct(TutorialRepository $repository, TutorialValidator $validator, TutorialService $service, CategoriesRepository $categoriesRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		  $this->categoriesRepository  = $categoriesRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tutorials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tutorials,
            ]);
        }

		$title = "Tutoriais - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('tutorials/tutorials', ['tutorials' => $tutorials]);
		echo view('footer');
    }
	
	public function single($tutorial){
		$tutorial = $this->repository->find($tutorial);
		$title = $tutorial['title'] ." - Escola LTG";
		
		$url = $tutorial['video_url'];
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

		$id = $matches[1];
		$video_embed = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $id . '" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';
		
		echo view('header', ['title' => $title]);
		echo view('tutorials/tutorial', ['tutorial' => $tutorial, 'video_embed' => $video_embed]);
		echo view('footer');
	}
	
	 public function adminIndex(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tutorials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tutorials,
            ]);
        }

		$title = "Tutoriais - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/tutorials',['tutorials' => $tutorials]);
		echo view('admin/footer');
    }
	
	public function adicionarTutorial(){
		$categories_list = $this->categoriesRepository->selectBoxList();
		$title = "Tutoriais - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/add_tutorial', ['categories' => $categories_list])->render();
		echo view('admin/footer')->render();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  TutorialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TutorialCreateRequest $request){
		 if($request->file('thumbnail')){
		 	$image = $request->file('thumbnail');
		 	$extension = $image->getClientOriginalExtension();
			$newImageName = md5(microtime()) . "." . $extension;
			$path = $image->storeAs('thumbnails', $newImageName);
		 } 

		 $request = $this->service->store($request->all(), ['thumbnail' => 'nada']);
		 
		 $tutorial = $request['success'] ? $request['data'] : null;
		 
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->route('admin.add_tutorials'); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutorial = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tutorial,
            ]);
        }

        return view('tutorials.show', compact('tutorial'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tutorial = $this->repository->find($id);

        return view('tutorials.edit', compact('tutorial'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TutorialUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TutorialUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tutorial = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tutorial updated.',
                'data'    => $tutorial->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Tutorial deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Tutorial deleted.');
    }
}
