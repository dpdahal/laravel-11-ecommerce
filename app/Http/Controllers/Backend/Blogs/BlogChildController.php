<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Blog\BlogPageCreate;
use App\Repositories\Blogs\BlogChild\BlogChildInterface;
use Illuminate\Http\Request;

class BlogChildController extends BackendController
{
    protected BlogChildInterface $pChild;

    public function __construct(BlogChildInterface $pChild)
    {
        parent::__construct();
        $this->pChild = $pChild;
    }

    public function index(Request $request)
    {
        $pid = $request->pid;
        $postsData = $this->pChild->all($pid);
        $this->data('postsData', $postsData);
        return view($this->pagePath . 'blog.page.index', $this->data);
    }

    public function create($pid)
    {
        $this->data('pid', $pid);
        return view($this->pagePath . 'blog.page.create', $this->data);
    }

    public function store(BlogPageCreate $request)
    {
        $data = $request->all();
        $data['blog_id'] = $request->pid;
        if ($data) {
            $this->pChild->insert($data);
            return redirect()->back()->with('success', 'data was inserted');
        } else {
            return redirect()->back()->with('error', 'data was not inserted');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->pid;
        $this->data('postsData', $this->pChild->get($id));
        return view($this->pagePath . 'blog.page.update', $this->data);
    }

    public function update(Request $request)
    {
        $id = $request->pid;
        $data = $request->all();
        $data['blog_id'] = $request->pid;
        if ($data) {
            $this->pChild->update($data, $id);
            return redirect()->back()->with('success', 'data was updated');
        } else {
            return redirect()->back()->with('error', 'data was not updated');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->pid;
        if ($id) {
            $this->pChild->delete($id);
            return redirect()->back()->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'data was not deleted');
        }
    }


}
