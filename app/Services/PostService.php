<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\PostRepository;
use App\Validators\PostValidator;

class PostService{
	private $respository;
	private $validator;
	
	public function __construct(PostRepository $repository,PostValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$post = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Postagem criada com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	
	public function update($data, $post_id){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$post = $this->repository->update($data, $post_id);
			
			return [
				'success'   => true,
				'messages'  => "Postagem editada com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessageBag(),
			];
		}
		
	}
	
	public function delete($post_id){
		try{

			$post = $this->repository->delete($post_id);
			
			return [
				'success'   => true,
				'messages'  => "Postagem removida com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
}