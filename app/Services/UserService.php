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
	public function update($data, $user_id){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$user = $this->repository->update($data, $user_id);
			
			return [
				'success'   => true,
				'messages'  => "Usuário editado com sucesso!",
				'data'     => $user
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
		
	}
	
	public function delete($user_id){
		try{

			$user = $this->repository->delete($user_id);
			
			return [
				'success'   => true,
				'messages'  => "Usuário removido com sucesso!",
				'data'     => $user
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
}