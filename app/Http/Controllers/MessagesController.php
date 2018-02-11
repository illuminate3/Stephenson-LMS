<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController {
	public function index(){
		echo view('messages.index');
	}
}
