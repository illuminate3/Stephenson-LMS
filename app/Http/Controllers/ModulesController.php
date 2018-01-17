<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ModuleCreateRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Repositories\ModuleRepository;
use App\Validators\ModuleValidator;
use App\Services\ModuleService;


class ModulesController extends Controller
{

    /**
     * @var ModuleRepository
     */
    protected $repository;

    /**
     * @var ModuleValidator
     */
    protected $validator;
    protected $srvice;

    public function __construct(ModuleRepository $repository, ModuleValidator $validator, ModuleService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ModuleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleCreateRequest $request, $id){

		 $request = $this->service->store($request->all());
		 $module = $request['success'] ? $request['data'] : null;
		 
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect('/admin/course/manage/'. $id ); 
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
        $module = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $module,
            ]);
        }

        return view('modules.show', compact('module'));
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

        $module = $this->repository->find($id);

        return view('modules.edit', compact('module'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ModuleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ModuleUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $module = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Module updated.',
                'data'    => $module->toArray(),
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
                'message' => 'Module deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Module deleted.');
    }
}
