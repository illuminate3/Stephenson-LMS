<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\CourseRepository;
use App\Validators\CourseValidator;
use Illuminate\Support\Facades\Input;

class CourseService{
	private $respository;
	private $validator;
	
	public function __construct(CourseRepository $repository, CourseValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$course = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Curso criado com sucesso!",
				'data'     => $course
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