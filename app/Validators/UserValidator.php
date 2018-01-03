<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			  'firstname' => 'required', 
			  'lastname' => 'required', 
			  'user' => 'required',
			  'email' => 'required'
		  ],
		 
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
