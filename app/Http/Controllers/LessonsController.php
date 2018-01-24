<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\LessonRepository;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;
use App\Validators\LessonValidator;
use App\Services\LessonService;


class LessonsController extends Controller
{

    /**
     * @var LessonRepository
     */
    protected $repository;

    /**
     * @var LessonValidator
     */
    protected $validator;

    public function __construct(LessonRepository $repository, LessonValidator $validator, LessonService $service,CourseRepository $courseRepository, ModuleRepository $moduleRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
		 
        $this->course_repository  = $courseRepository;
        $this->module_repository  = $moduleRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $lessons = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $lessons,
            ]);
        }

        return view('lessons.index', compact('lessons'));
    }
	
	public function adicionarAula($course, $module){
		$title = "Adicionar Aula - Escola LTG";
		$atual_course = $this->course_repository->find($course);
		$atual_module = $this->module_repository->find($module);
		
		echo view('admin/header', ['title' => $title]);
		echo view('admin/add_lesson', ['course' => $atual_course, 'module' => $atual_module]);
		echo view('admin/footer');
	}
	
	public function editarAula($course, $module, $lesson){
		$course = $this->course_repository->find($course);
		$module = $this->module_repository->find($module);
		$lesson = $this->repository->find($lesson);
		
		$title = "Editar " . $lesson->title ." - Escola LTG";
		
		echo view('admin/header', ['title' => $title]);
		echo view('admin/edit_lesson', ['course' => $course, 'module' => $module, 'lesson' => $lesson]);
		echo view('admin/footer');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  LessonCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LessonCreateRequest $request)
    {
		 $request = $this->service->store($request->all()); 
		 $lesson = $request['success'] ? $request['data'] : null;
		 
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
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
        $lesson = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $lesson,
            ]);
        }

        return view('lessons.show', compact('lesson'));
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

        $lesson = $this->repository->find($id);

        return view('lessons.edit', compact('lesson'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LessonUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(LessonUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $lesson = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Lesson updated.',
                'data'    => $lesson->toArray(),
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
                'message' => 'Lesson deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Lesson deleted.');
    }
}
