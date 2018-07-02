<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rule = [
        'name' => 'required|max:255',
        'reposible' => 'required|max:255',
        'email' => 'required|max:255|email',
        'email' => 'required',
        'adress' => 'required'
    ];

}
