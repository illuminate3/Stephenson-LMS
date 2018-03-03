<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController{
	public function __construct(){

	}

	public function index(){
		$title = "Estilos";

		return view('admin.style.index',[
			'title' => "Estilos"
		]);
	}
}
