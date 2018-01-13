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
		$title = "Dashboard - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/painel');
		echo view('admin/footer');
	}
	
	public function settings(){
		$title = "Configurações Gerais - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/settings');
		echo view('admin/footer');
	}
	
	public function library(){
		$title = "Mídia - Escola LTG";
		echo view('admin/header', ['title' => $title]);
		echo view('admin/library');
		echo view('admin/footer');
	}
}
