<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Blog\BlogCategoyCreateRequest;
use App\Repositories\Blogs\Category\BlogCategoryInterface;
use Illuminate\Http\Request;


class BlogCategoryController extends BackendController
{
    protected BlogCategoryInterface $cat;

    public function __construct(BlogCategoryInterface $cat)
    {
        parent::__construct();
        $this->cat = $cat;
    }

    public function index(Request $request)
    {

        $this->checkAuthorization($request->user(), 'blog_categories_list');
        $categoryData = $this->cat->getParentData();
        $this->data('categoryData', $categoryData);
        return view($this->pagePath . 'blog.category.index', $this->data);
    }

    public function create(Request $request)
    {
        $this->checkAuthorization($request->user(), 'blog_categories_create');
        $this->data('categoryData', $this->cat->getParentData());
        return view($this->pagePath . 'blog.category.create', $this->data);

    }

    public function store(BlogCategoyCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'blog_categories_create');
        $data = $request->all();
        $data['slug'] = $this->make_slug($request->name);
        if ($this->cat->insert($data)) {
            return redirect()->route('manage-category.index')->with('success', 'data was inserted');
        } else {
            return redirect()->back()->with('error', 'data was not inserted');
        }

    }

    public function show(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blog_categories_show');
        $this->data('category', $this->cat->getById($id));
        return view($this->pagePath . 'blog.category.show', $this->data);
    }

    public function edit(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blog_categories_edit');
        $this->data('category', $this->cat->getById($id));
        $this->data('categoryData', $this->cat->getNotSelected($id));
        return view($this->pagePath . 'blog.category.edit', $this->data);
    }

    public function update(Request $request, string $id)
    {
        $this->checkAuthorization($request->user(), 'blog_categories_edit');
        $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $id,
            'slug' => 'required|unique:blog_categories,slug,' . $id
        ]);
        $data = $request->all();
        $data['slug'] = $this->make_slug($request->name);
        if ($this->cat->update($data, $id)) {
            return redirect()->route('manage-category.index')->with('success', 'data was updated');
        } else {
            return redirect()->back()->with('error', 'data was not updated');
        }
    }


    public function destroy(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blog_categories_delete');
        if ($this->cat->delete($id)) {
            return redirect()->route('manage-category.index')->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'data was not deleted');
        }
    }


}
