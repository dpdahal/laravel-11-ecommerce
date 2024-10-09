<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Repositories\Blogs\BlogsInterface;
use Illuminate\Http\Request;

class BlogController extends BackendController
{
    protected BlogsInterface $dr;

    public function __construct(BlogsInterface $dr)
    {
        parent::__construct();
        $this->dr = $dr;
    }

    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'blogs_list');
        $postsData = $this->dr->getAll();
        $this->data('postsData', $postsData);
        return view($this->pagePath . 'blog.index', $this->data);
    }

    public function create()
    {
        $this->checkAuthorization(auth()->user(), 'blogs_create');
        return view($this->pagePath . 'blog.create', $this->data);
    }

    public function store(BlogCreateRequest $requests)
    {
        $this->checkAuthorization(auth()->user(), 'blogs_create');
        $data = $requests->all();
        if ($data) {
            $this->dr->insert($data);
            return redirect()->route('manage-blog.index')->with('success', 'data was inserted');
        } else {
            return redirect()->back()->with('error', 'data was not inserted');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blogs_show');
        $this->data('postsData', $this->dr->getById($id));
        return view($this->pagePath . 'blog.show', $this->data);
    }


    public function edit(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blogs_edit');
        $this->data('blogData', $this->dr->getById($id));
        $this->data('categoryData', $this->dr->getAllCategory());
        return view($this->pagePath . 'blog.update', $this->data);
    }


    public function update(Request $request, string $id)
    {
        $this->checkAuthorization($request->user(), 'blogs_edit');
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $id
        ]);
        if ($this->dr->update($request->all(), $id)) {
            return redirect()->route('manage-blog.index')->with('success', 'data was updated');
        } else {
            return redirect()->back()->with('error', 'data was not updated');
        }
    }


    public function destroy(string $id)
    {
        $this->checkAuthorization(auth()->user(), 'blogs_delete');
        if ($this->dr->delete($id)) {
            return redirect()->route('manage-blog.index')->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'data was not deleted');
        }
    }


}
