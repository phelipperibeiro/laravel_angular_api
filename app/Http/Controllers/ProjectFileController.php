<?php

namespace App\Http\Controllers;

use App\Service\ProjectService;
use Illuminate\Http\Request;


class ProjectFileController extends Controller
{

    /**
     *
     * @var ProjectService 
     */
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        
        $data['file'] = $file;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;
        $data['extension'] = $file->getClientOriginalExtension();

        return $this->service->createFile($data);      
    }
    
}
