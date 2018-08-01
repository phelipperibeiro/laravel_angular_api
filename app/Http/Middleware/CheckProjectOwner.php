<?php

namespace App\Http\Middleware;

use App\Repositories\Contracts\ProjectRepository;
use Closure;


class CheckProjectOwner
{

    /**
     *
     * @var ProjectRepository 
     */
    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user_id = auth()->guard('api')->user()->id;
        $project_id = $request->id;
        
        if (!$this->repository->isOwner($project_id, $user_id)) {
            return Response(['error' => 'Acess Forbidden']);
        }

        return $next($request);
    }

}
