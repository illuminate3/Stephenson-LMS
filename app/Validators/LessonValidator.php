<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class LessonValidator extends LaravelValidator
{

    protected $rules = [
         ValidatorInterface::RULE_CREATE => [
			  'title' => 'required',
			  'video_url' => 'required',
			  'course_id' => 'required',
			  'module_id' => 'required',
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
