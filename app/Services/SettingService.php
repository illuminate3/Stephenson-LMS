<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Contracts\ValidatorException;
use App\Repositories\SettingRepository;
use App\Entities\Setting;
use App\Validators\SettingValidator;
use Illuminate\Support\Facades\Input;

class SettingService{
	private $respository;
	private $validator;

	public function __construct(SettingRepository $repository, SettingValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function update($data){
		//dd($data);
		try{
			unset($data['_method'], $data['_token']);
			$settings = $data;

			foreach($settings as $key => $setting){
				$update = Setting::where('name', $key)->first();
				$update->value = $setting;
				$update->save();
			}

			return [
				'success'   => true,
				'messages'  => "Configurações editadas com sucesso!",
				'data'     => $setting
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}

	}
}
