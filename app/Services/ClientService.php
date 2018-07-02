<?php

namespace App\Service;

use App\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{

    /**
     *
     * @var ClientRepository 
     */
    protected $repository;

    /**
     *
     * @var ClientValidator 
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator)
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

            $this->validator($data)->passesOrFail();
            return $this->repository->create($request->all());
            
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

            $this->validator($data)->passesOrFail();
            return $this->repository->find($id)->update($data);
            
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

}
