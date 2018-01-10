<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class LessonValidator extends LaravelValidator
{

    protected $rules = [
         ValidatorInterface::RULE_CREATE => [
			  'title' => 'required'
			  'professor' => 'required'
			  'category' => 'required'
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
