<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ClientRepository;
use App\Service\ClientService;

class ClientController extends Controller
{

    /**
     *
     * @var ClientRepository 
     */
    private $repository;

    /**
     *
     * @var ClientService 
     */
    private $service;

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        
        $this->service = $service;
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
    public function create(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

}
