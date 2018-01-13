<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\ModuleRepository;
use App\Validators\ModuleValidator;

class ModuleService{
	private $respository;
	private $validator;
	
	public function __construct(ModuleRepository $repository, ModuleValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$module = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Módulo criado com sucesso!",
				'data'     => $module
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	
	public function update(){}
	public function delete(){}
}