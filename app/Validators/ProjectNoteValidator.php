<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class ProjectNoteValidator extends LaravelValidator
{
    
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required|integer',
            'title' => 'required',
            'note' => 'required'],
        ValidatorInterface::RULE_UPDATE => [
            'project_id' => 'required|integer',
            'title' => 'required',
            'note' => 'required']
    ];

}
