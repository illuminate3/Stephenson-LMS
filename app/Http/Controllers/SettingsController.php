<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\SettingRepository;
use App\Validators\SettingValidator;
use App\Services\SettingService;

class SettingsController{

    protected $repository;
    protected $validator;
    protected $service;
	
	 protected $categories_repository;

    public function __construct(SettingRepository $repository, SettingValidator $validator, SettingService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }
	
    public function index(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $settings = $this->repository->all();

			$title = "Páginas - Escola LTG";
			echo view('admin.header', ['title' => $title]);
			echo view('admin.settings.index', ['settings' => $settings]);
			echo view('admin.footer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id){
		 $request = $this->service->update($request->all(), $id); 
		 $page = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }

}
