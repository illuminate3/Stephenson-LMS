<?php

namespace App\Services;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;
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
				//'messages'  => 'Postagem criada com sucesso!<a href="' . URL::route('posts.single', ['id' =>]) . '"> Ver Postagem</a>',
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
				'messages'  => 'Postagem editada com sucesso!<a href="' . URL::route('posts.single', ['id' => $post_id]) . '"> Ver Postagem</a>',
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
				'messages'  => "Postagem movida para a lixeira com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	
	public function restore($post_id){
		try{

			$post = $this->repository->restore($post_id);
			
			return [
				'success'   => true,
				'messages'  => "Postagem restaurada com sucesso!",
				'data'     => $post
			];
		} catch(Exception $e){
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	
	public function deleteFromBD($post_id){
		try{

			$post = $this->repository->deleteFromBD($post_id);
			
			return [
				'success'   => true,
				'messages'  => "Postagem excluída com sucesso!",
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