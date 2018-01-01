<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function homepage(){
		$title = "Escola LTG - Estudarn não precisa ser chato!";
		echo view('home', ['title' => $title]);
		echo view('footer');
	}
	
	public function login(){
		$title = "Login - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('login');
		echo view('footer');
	}
	
	public function cadastro(){
		$title = "Cadastro - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('cadastro');
		echo view('footer');
	}
	
	public function perfil(){
		$title = "Perfil - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('perfil');
		echo view('footer');
	}
	
	public function chat(){
		$title = "Chat - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('chat');
	}
}
