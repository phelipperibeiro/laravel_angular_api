<?php

namespace App\Service;

use App\Validators\ProjectNoteValidator;
use App\Repositories\Contracts\ProjectNoteRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProjectNoteService
{

    /**
     *
     * @var ProjectNoteRepository 
     */
    protected $repository;

    /**
     *
     * @var ProjectNoteValidator 
     */
    protected $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($data)
    {
        try {

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            return $this->repository->create($data);
            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($data, $id)
    {
        try {

            $this->validator($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repository->find($id)->update($data);
            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    
}
