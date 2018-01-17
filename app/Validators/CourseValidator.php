<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CourseValidator extends LaravelValidator
{

    protected $rules = [
		  ValidatorInterface::RULE_CREATE => [
			  'title' => 'required',
			  'author_id' => 'required',
			  'category_id' => 'required'
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
