<?php

namespace App\Service;

use App\Validators\ProjectValidator;
use App\Repositories\Contracts\ProjectRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

## replace facades        ###; 
## 5.4  => facades        ###; 
## facade-class-reference ###;

//use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

//use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class ProjectService
{

    /**
     *
     * @var ProjectRepository 
     */
    protected $repository;

    /**
     *
     * @var ProjectValidator 
     */
    protected $validator;

    /**
     *
     * @var Filesystem 
     */
    protected $filesystem;

    /**
     *
     * @var Storage 
     */
    protected $storage;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
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

    public function createFile(array $data)
    {
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        
        $projectFile = $project->files()->create($data); 
        
        $fileName = 'FileID_'.$projectFile->id.'_ProjectID_'.$projectFile->project_id;
        
        $this->storage->put($fileName. "." . $data['extension'], $this->filesystem->get($data['file']));
        
        return [
            'error' => false,
            'message' => 'File inserted successfully'
        ];
    }

}
