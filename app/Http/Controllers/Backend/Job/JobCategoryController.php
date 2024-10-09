<?php

namespace App\Http\Controllers\Backend\Job;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Job\JobCategoryCreateRequest;
use App\Repositories\Job\JobCategory\JobCategoryInterface;
use Illuminate\Http\Request;

class JobCategoryController extends BackendController
{
    protected JobCategoryInterface $cat;

    public function __construct(JobCategoryInterface $cat)
    {
        parent::__construct();
        $this->cat = $cat;
    }

    public function index(Request $request)
    {

        $this->checkAuthorization($request->user(), 'job_categories_list');
        $categoryData = $this->cat->getParentData()->paginate(100);
        if (!empty($request->search)) {
            $categoryData = $this->cat->getAll($request->search,
                ['name']
            )->paginate(10);
        }
        $this->data('categoryData', $categoryData);
        return view($this->pagePath . 'job.category.index', $this->data);
    }

    public function create()
    {
        $this->checkAuthorization(auth()->user(), 'job_categories_create');
        $categoryData = $this->cat->getParentData()->get();
        $this->data('categoryData', $categoryData);
        return view($this->pagePath . 'job.category.create', $this->data);
    }


    public function store(JobCategoryCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'job_categories_create');
        $data = $request->all();
        $data['slug'] = $this->make_slug($request->name);
        if ($this->cat->insert($data)) {
            return redirect()->route('manage-job-category.index')->with('success', 'data was inserted');
        } else {
            return redirect()->back()->with('error', 'data was not inserted');
        }

    }

    public function show(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'job_categories_show');
        $this->data('category', $this->cat->getById($id));
        return view($this->pagePath . 'job.category.show', $this->data);
    }

    public function edit(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'job_categories_edit');
        $this->data('category', $this->cat->getById($id));
        $this->data('categoryData', $this->cat->getNotSelected($id));
        return view($this->pagePath . 'job.category.edit', $this->data);
    }

    public function update(Request $request, string $id)
    {
        $this->checkAuthorization($request->user(), 'job_categories_edit');
        $request->validate([
            'name' => 'required|unique:job_categories,name,' . $id,
            'slug' => 'required|unique:job_categories,slug,' . $id
        ]);
        $data = $request->all();
        $data['slug'] = $this->make_slug($request->name);
        if ($this->cat->update($data, $id)) {
            return redirect()->route('manage-job-category.index')->with('success', 'data was updated');
        } else {
            return redirect()->back()->with('error', 'data was not updated');
        }
    }


    public function destroy(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'job_categories_delete');
        if ($this->cat->delete($id)) {
            return redirect()->route('manage-job-category.index')->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'data was not deleted');
        }
    }


}
