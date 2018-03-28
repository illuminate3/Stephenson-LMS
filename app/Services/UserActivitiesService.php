<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Contracts\ValidatorException;
use App\Repositories\UserActivitiesRepository;
use App\Validators\UserActivitiesValidator;
use Auth;

class UserActivitiesService{
	private $respository;
	private $validator;

	public function __construct(UserActivitiesRepository $repository, UserActivitiesValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store($data){
		try{
			$v_data = strip_tags($data['data'], '<b><i><u>');
			$v_token = $data['_token'];
			$v_user = Auth::user()->id;
			$data = ['data' => $v_data, 'token' => $v_token, 'user_id' => $v_user];
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$activity = $this->repository->create($data);

			return [
				'success'   => true,
				'data'     => $activity,
				'messages'     => "Postagem efetuada com sucesso",
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	/*

	public function update($data, $category_id){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$category = $this->repository->update($data, $category_id);

			return [
				'success'   => true,
				'messages'  => "Categoria editada com sucesso!",
				'data'     => $category
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}

	}

	public function delete($category_id){
		try{

			$category = $this->repository->delete($category_id);

			return [
				'success'   => true,
				'messages'  => "Categoria removida com sucesso!",
				'data'     => $category
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	*/
}
