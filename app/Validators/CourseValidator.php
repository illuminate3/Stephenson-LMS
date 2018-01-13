<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CourseValidator extends LaravelValidator
{

    protected $rules = [
         ValidatorInterface::RULE_CREATE => [
			  'name' => 'required',
			  'course' => 'required'
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
