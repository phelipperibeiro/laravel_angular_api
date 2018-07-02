<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class ClientValidator extends LaravelValidator
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
            'name' => 'required|max:255',
            'responsible' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|max:255|email',
            'address' => 'required',
            'obs' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:255',
            'responsible' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required',
            'address' => 'required',
            'obs' => 'required'
        ]
    ];

}
