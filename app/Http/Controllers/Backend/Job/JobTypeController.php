<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\JobTypeCreateRequest;
use App\Repositories\Job\JobType\JobTypeInterface;
use Illuminate\Http\Request;

class JobTypeController extends BackendController
{
    protected JobTypeInterface $pI;

    function __construct(JobTypeInterface $permissionInterface)
    {
        parent::__construct();
        $this->pI = $permissionInterface;
    }


    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_types_list');
        return view($this->pagePath . 'job.job-type.index');
    }


    public function allJobs(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_types_list');
        $sectionData = $this->pI->all();
        return response()->json($sectionData);
    }

    public function store(JobTypeCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'job_types_create');
        $this->pI->store($request->all());
        return response()->json(['success' => 'Permission created successfully']);
    }

    public function delete(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_types_delete');
        $response = $this->pI->delete($request->id);
        if (!$response) {
            return response()->json(['error' => 'Section is already in use']);
        } else {
            return response()->json(['success' => 'Section deleted successfully']);
        }

    }

    public function edit(Request $request)
    {
        $this->checkAuthorization($request->user(), 'job_types_edit');
        $sectionData = $this->pI->show($request->id);
        return response()->json($sectionData);
    }

    public function update(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:job_types,type,' . $request->id,
        ]);
        $this->checkAuthorization($request->user(), 'job_types_edit');
        $this->pI->update($request->all(), $request->id);
        return response()->json(['success' => 'Job updated successfully']);
    }
}
