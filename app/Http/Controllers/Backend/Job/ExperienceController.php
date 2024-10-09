<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\ExperienceCreateRequest;
use App\Repositories\Job\Experience\ExperienceInterface;
use Illuminate\Http\Request;

class ExperienceController extends BackendController
{
    protected $pI;

    function __construct(ExperienceInterface $experience)
    {
        parent::__construct();
        $this->pI = $experience;
    }


    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_list');
        return view($this->pagePath . 'job.experience.index');
    }


    public function allJobs(Request $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_list');
        $sectionData = $this->pI->all();
        return response()->json($sectionData);
    }

    public function store(ExperienceCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_create');
        $this->pI->store($request->all());
        return response()->json(['success' => 'experiences created successfully']);
    }

    public function delete(Request $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_delete');
        $response = $this->pI->delete($request->id);
        if (!$response) {
            return response()->json(['error' => 'experiences is already in use']);
        } else {
            return response()->json(['success' => 'experiences deleted successfully']);
        }

    }

    public function edit(Request $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_edit');
        $sectionData = $this->pI->show($request->id);
        return response()->json($sectionData);
    }

    public function update(Request $request)
    {
        $this->checkAuthorization($request->user(), 'experiences_edit');
        $request->validate([
            'name' => 'required|unique:experiences,name,' . $request->id,
        ]);
        $this->pI->update($request->all(), $request->id);
        return response()->json(['success' => 'experiences updated successfully']);
    }
}
