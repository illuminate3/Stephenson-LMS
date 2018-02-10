<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController {
	public function index(){
		$title = "Chat - Stephenson";
		echo view('header', ['title' => $title]);
		echo view('messages.index');
	}
}
