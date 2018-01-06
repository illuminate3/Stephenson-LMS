<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\TutorialRepository;
use App\Validators\TutorialValidator;

class TutorialService{
	private $respository;
	private $validator;
	
	public function __construct(TutorialRepository $repository, TutorialValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$tutorial = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Tutorial criado com sucesso!",
				'data'     => $tutorial
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