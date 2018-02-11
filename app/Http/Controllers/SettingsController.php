<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Validators\SettingValidator;
use App\Services\SettingService;

class SettingsController{

    protected $validator;
    protected $service;
	
	 protected $categories_repository;

    public function __construct(SettingValidator $validator, SettingService $service){
        $this->validator  = $validator;
        $this->service  = $service;
    }
	
    public function index(){
			$title = "Configurações - Stephenson";
			echo view('admin.header', ['title' => $title]);
			echo view('admin.settings.index');
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
	/*
    public function update(Request $request, $id){
		 $request = $this->service->update($request->all(), $id); 
		 $page = $request['success'] ? $request['data'] : null;
		  
		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);
		 
		 return redirect()->back(); 
    }*/

}
