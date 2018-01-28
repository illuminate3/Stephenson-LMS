<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\SettingRepository;
use App\Validators\SettingValidator;
use Illuminate\Support\Facades\Input;

class SettingService{
	private $respository;
	private $validator;
	
	public function __construct(SettingRepository $repository, SettingValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function update($data, $tutorial_id){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$tutorial = $this->repository->update($data, $tutorial_id);
			
			return [
				'success'   => true,
				'messages'  => "Tutorial editado com sucesso!",
				'data'     => $tutorial
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
		
	}
}