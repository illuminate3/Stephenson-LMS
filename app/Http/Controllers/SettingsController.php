<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Validators\SettingValidator;
use App\Services\SettingService;
use App\Repositories\SettingRepository;


class SettingsController{

    protected $validator;
    protected $service;
    protected $repository;

    public function __construct(SettingValidator $validator, SettingService $service, SettingRepository $repository){
        $this->validator  = $validator;
        $this->service  = $service;
        $this->repository  = $repository;
    }

    public function index(){
			$title = "Configurações - Stephenson";
      $settings = $this->repository->all();
      dd($settings);
			return view('admin.settings.index', [
        'title' => $title,
        'settings' => $settings
      ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */

    public function update(Request $request){
		 $request = $this->service->update($request->all());
		 $page = $request['success'] ? $request['data'] : null;

		 session()->flash('success',[
			 'success' =>	$request['success'],
			 'messages' =>	$request['messages']
		 ]);

		 return redirect()->back();
    }

}
