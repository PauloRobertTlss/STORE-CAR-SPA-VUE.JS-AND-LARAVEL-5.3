<?php

namespace StoreTI\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => ['name'=>'required','contact'=>'required','email'=>'required|email'],
        ValidatorInterface::RULE_UPDATE => ['name'=>'required']
   ];
}
