<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\EducationCreateRequest;
use App\Repositories\Job\Education\EducationLevelInterface;
use Illuminate\Http\Request;


class EducationLevelController extends BackendController
{
    protected $eI;

    function __construct(EducationLevelInterface $educationLevelInterface)
    {
        parent::__construct();
        $this->eI = $educationLevelInterface;
    }

    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'education_list');
        return view($this->pagePath . 'job.education.index');
    }


    public function allEducation(Request $request)
    {
        $this->checkAuthorization($request->user(), 'education_list');
        $sectionData = $this->eI->all();
        return response()->json($sectionData);
    }

    public function store(EducationCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'education_create');
        $this->eI->store($request->all());
        return response()->json(['success' => 'Education created successfully']);
    }

    public function delete(Request $request)
    {
        $this->checkAuthorization($request->user(), 'education_delete');
        $response = $this->eI->delete($request->id);
        if (!$response) {
            return response()->json(['error' => 'Education is already in use']);
        } else {
            return response()->json(['success' => 'Education deleted successfully']);
        }

    }

    public function edit(Request $request)
    {
        $this->checkAuthorization($request->user(), 'education_edit');
        $sectionData = $this->eI->show($request->id);
        return response()->json($sectionData);
    }

    public function update(Request $request)
    {
        $this->checkAuthorization($request->user(), 'education_edit');
        $request->validate([
            'name' => 'required|unique:education,name,' . $request->id,
        ]);
        $this->eI->update($request->all(), $request->id);
        return response()->json(['success' => 'Education updated successfully']);
    }
}
