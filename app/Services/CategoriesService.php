<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\CategoriesRepository;
use App\Validators\CategoriesValidator;

class CategoriesService{
	private $respository;
	private $validator;
	
	public function __construct(CategoriesRepository $repository,CategoriesValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$categories = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Categoria criada com sucesso!",
				'data'     => $categories
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