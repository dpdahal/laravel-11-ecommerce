<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\SkillCreateRequest;
use App\Repositories\Job\Skills\SkillsInterface;
use Illuminate\Http\Request;

class SkillsController extends BackendController
{
    protected $pI;

    function __construct(SkillsInterface $permissionInterface)
    {
        parent::__construct();
        $this->pI = $permissionInterface;
    }


    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'skills_list');
        return view($this->pagePath . 'job.skills.index');
    }


    public function allJobs(Request $request)
    {
        $this->checkAuthorization($request->user(), 'skills_list');
        $sectionData = $this->pI->all();
        return response()->json($sectionData);
    }

    public function store(SkillCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'skills_create');
        $this->pI->store($request->all());
        return response()->json(['success' => 'Skills created successfully']);
    }

    public function delete(Request $request)
    {
        $this->checkAuthorization($request->user(), 'skills_delete');
        $response = $this->pI->delete($request->id);
        if (!$response) {
            return response()->json(['error' => 'Skills is already in use']);
        } else {
            return response()->json(['success' => 'Skills deleted successfully']);
        }

    }

    public function edit(Request $request)
    {
        $this->checkAuthorization($request->user(), 'skills_edit');
        $sectionData = $this->pI->show($request->id);
        return response()->json($sectionData);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills,name,' . $request->id,
        ]);
        $this->checkAuthorization($request->user(), 'skills_edit');
        $this->pI->update($request->all(), $request->id);
        return response()->json(['success' => 'Skill updated successfully']);
    }
}
