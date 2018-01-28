<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Contracts\ValidatorException;	
use App\Repositories\CommentRepository;
use App\Validators\CommentValidator;

class CommentService{
	private $respository;
	private $validator;
	
	public function __construct(CommentRepository $repository,CommentValidator $validator){
		$this->repository = $repository;
		$this->validator = $validator;
	}
	
	public function store(array $data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$comment = $this->repository->create($data);
			
			return [
				'success'   => true,
				'messages'  => "Comentário realizado com sucesso!",
				'data'     => $comment
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	
	public function update($data, $comment_id){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$post = $this->repository->update($data, $comment_id);
			
			return [
				'success'   => true,
				'messages'  => "Comentário alterado com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
		
	}
	
	public function delete($comment_id){
		try{

			$post = $this->repository->delete($comment_id);
			
			return [
				'success'   => true,
				'messages'  => "O comentário foi removido",
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