<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController{
	public function __construct(){
		
	}
	
	public function index(){
		echo view('admin.header',['title' => "Estilos"]);
		echo view('admin.style.index');
		echo view('admin.footer');
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
