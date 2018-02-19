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

public function changeTheme(Request $themeName)
{
		$themeName = $themeName->theme;
    if(\Theme::exists($themeName)){
        \Theme::set($themeName);
        session(['theme-name' => $themeName]);
        return redirect()->back();
    } else {
		 echo 'Deu merda';
	 }
}
}
