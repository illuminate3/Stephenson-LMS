<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class PageValidator extends LaravelValidator
{

    protected $rules = [
         ValidatorInterface::RULE_CREATE => [
			  'title' => 'required',
			  'slug' => 'required',
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
