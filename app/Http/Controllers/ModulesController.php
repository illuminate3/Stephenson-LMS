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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
		 
		 return redirect()->back();
    }
	
	public function reorder(){
		$rm = DB::table('modules');
		$module_id = Input::get('moduleId');
		$module_index = Input::get('moduleIndex');
		
		foreach ($rm as $m){
			return DB::table('modules')->where('id', '=', $module_id)->update(array('position' => $module_index));
		}
	}
	
    /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $course_id, $module_id){
		 $request = $this->service->update($request->all(), $module_id); 
		 $module = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $module_id){
       $request= $this->service->delete($module_id);
		 $module = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }
}
