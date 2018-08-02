<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProjectRepository;
use App\Service\ProjectService;

class ProjectController extends Controller
{

    /**
     *
     * @var ProjectRepository 
     */
    private $repository;

    /**
     *
     * @var ProjectService 
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service)
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
        $user_id = auth()->guard('api')->user()->id;

        return $this->repository->findWhere(['owner_id' => $user_id]);
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
        if(!$this->checkProjectPermissions($id)){
            return ['error' => 'Acess Forbidden'];
        }
        
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
        if(!$this->checkProjectPermissions($id)){
            return ['error' => 'Acess Forbidden'];
        }
        
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
        if(!$this->checkProjectOwner($id)){
            return ['error' => 'Acess Forbidden'];
        }
        
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId)
    {
        $userId = auth()->guard('api')->user()->id;

        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId)
    {
        $userId = auth()->guard('api')->user()->id;

        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId)
    {
        if ($this->checkProjectOwner($projectId) || $this->checkProjectMember($projectId)) {
            return true;
        }

        return false;
    }

}
