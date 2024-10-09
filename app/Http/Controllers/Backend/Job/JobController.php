<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Repositories\Job\JobInterface;
use Illuminate\Http\Request;

class JobController extends BackendController
{
    protected JobInterface $jobIp;

    public function __construct(JobInterface $jobIp)
    {
        parent::__construct();
        $this->jobIp = $jobIp;
    }


    public function index()
    {
        $this->data('jobsData', $this->jobIp->all());
        return view($this->pagePath . 'job.index', $this->data);
    }

    public function create()
    {
        $this->data('jobCategory', $this->jobIp->getJobCategory());
        $this->data('jobType', $this->jobIp->getJobType());
        $this->data('jobLevel', $this->jobIp->getJobLevel());
        $this->data('jobSkill', $this->jobIp->getJobSkill());
        $this->data('jobEducation', $this->jobIp->getJobEducation());
        $this->data('companyData', $this->jobIp->getCompany());
        $this->data('experienceData', $this->jobIp->getExperience());
        return view($this->pagePath . 'job.create', $this->data);
    }

    public function store(Request $request)
    {
        $this->jobIp->storeJob($request->all());
        return redirect()->route('manage-job.index');
    }

    public function show(string $id)
    {
        $this->data('jobData', $this->jobIp->show($id));
        return view($this->pagePath . 'job.show', $this->data);
    }

    public function edit(string $id)
    {

        $this->data('jobCategory', $this->jobIp->getJobCategory());
        $this->data('jobType', $this->jobIp->getJobType());
        $this->data('jobLevel', $this->jobIp->getJobLevel());
        $this->data('jobSkill', $this->jobIp->getJobSkill());
        $this->data('jobEducation', $this->jobIp->getJobEducation());
        $this->data('companyData', $this->jobIp->getCompany());
        $this->data('experienceData', $this->jobIp->getExperience());
        $this->data('jobData', $this->jobIp->show($id));
        return view($this->pagePath . 'job.edit', $this->data);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:job_pages,slug,' . $id,
        ]);
        $this->jobIp->update($request->all(), $id);
        return redirect()->route('manage-job.index');
    }

    public function destroy(string $id)
    {
        if ($this->jobIp->delete($id)) {
            return redirect()->back()->with('success', 'Job Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Job Not Deleted');
        }
    }

    public function clearAttribute($id, $table)
    {
        $this->jobIp->clearAttributeByCriteria($id, $table);
        return redirect()->back();
    }
}
