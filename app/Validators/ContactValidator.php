<?php

namespace StoreTI\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContactValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => ['contact'=>'required'],
        ValidatorInterface::RULE_UPDATE => ['contact'=>'required']
   ];
}
