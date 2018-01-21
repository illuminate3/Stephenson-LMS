<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\LessonRepository;
use App\Validators\LessonValidator;

class LessonService{
	private $respository;
	private $validator;
	
	public function __construct(LessonRepository $repository, LessonValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$tutorial = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Lição criado com sucesso!",
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