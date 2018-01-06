<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

class DashboardController extends Controller{
	private $repository;
	private $validator;

	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}
	
	public function index(){
		echo view('admin/header');
		echo view('admin/painel');
		echo view('admin/footer');
	}
}
