<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class ProjectValidator extends LaravelValidator
{

    protected $messages = [
        'required' => 'The :attribute field is required.',
        'email.required' => 'We need to know your e-mail address!',
    ];
    protected $attributes = [
        'email' => 'E-mail',
        'obs' => 'Observation',
    ];
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
