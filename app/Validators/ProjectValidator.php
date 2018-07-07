<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class ProjectValidator extends LaravelValidator
{
    
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'owner_id' => 'required|integer',
            'client_id' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'due_date' => 'required'],
        ValidatorInterface::RULE_UPDATE => [
            'owner_id' => 'required|integer',
            'client_id' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'due_date' => 'required']
    ];

}
