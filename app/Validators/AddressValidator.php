<?php

namespace StoreTI\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AddressValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => ['route'=>'required','number'=>'required|int','postcode'=>'required','city'=>'required','neighborhood'],
        ValidatorInterface::RULE_UPDATE => ['name'=>'required']
   ];
}
