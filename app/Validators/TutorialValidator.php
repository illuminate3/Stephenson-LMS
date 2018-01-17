<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TutorialValidator extends LaravelValidator
{

    protected $rules = [
         ValidatorInterface::RULE_CREATE => [
			  'title' => 'required', 
			  'video_url' => 'required', 
			  'author_id' => 'required',
		  ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
