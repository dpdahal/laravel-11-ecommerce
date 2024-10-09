<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\JobLevelCreateRequest;
use App\Repositories\Job\Levels\LevelsInterface;
use Illuminate\Http\Request;

class JobLevelController extends BackendController
{
    protected $pI;

    function __construct(LevelsInterface $permissionInterface)
    {
        parent::__construct();
        $this->pI = $permissionInterface;
    }


    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_levels_list');
        return view($this->pagePath . 'job.job-levels.index');
    }


    public function allJobs(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_levels_list');
        $sectionData = $this->pI->all();
        return response()->json($sectionData);
    }

    public function store(JobLevelCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'job_levels_create');
        $this->pI->store($request->all());
        return response()->json(['success' => 'Levels created successfully']);
    }

    public function delete(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_levels_delete');
        $response = $this->pI->delete($request->id);
        if (!$response) {
            return response()->json(['error' => 'Levels is already in use']);
        } else {
            return response()->json(['success' => 'Levels deleted successfully']);
        }

    }

    public function edit(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_levels_edit');
        $sectionData = $this->pI->show($request->id);
        return response()->json($sectionData);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:job_levels,name,' . $request->id,
        ]);
        $this->checkAuthorization($request->user(), 'job_levels_edit');
        $this->pI->update($request->all(), $request->id);
        return response()->json(['success' => 'Levels updated successfully']);
    }
}
