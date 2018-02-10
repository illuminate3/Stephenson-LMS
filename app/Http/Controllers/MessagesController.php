<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController {
	public function index(){
		$title = "Chat - Escola LTG";
		echo view('header', ['title' => $title]);
		echo view('messages.index');
	}
}
