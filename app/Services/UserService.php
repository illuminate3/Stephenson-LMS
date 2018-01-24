<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\UserRepository;
use App\Validators\UserValidator;


class UserService{
	private $respository;
	private $validator;
	
	public function __construct(UserRepository $repository, UserValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$usuario = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Usuário criado com sucesso!",
				'data'     => $usuario
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