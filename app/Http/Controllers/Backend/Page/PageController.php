<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Page\PageCreateRequest;
use App\Repositories\Page\PageInterface;
use Illuminate\Http\Request;

class PageController extends BackendController
{
    protected $pInterface;

    public function __construct(PageInterface $pInterface)
    {
        parent::__construct();
        $this->pInterface = $pInterface;
    }

    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'pages_list');
        $this->data('pageData', $this->pInterface->all());
        return view($this->pagePath . 'page.index', $this->data);
    }

    public function show(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'pages_list');
        $this->data('page', $this->pInterface->get($id));
        return view($this->pagePath . 'page.show', $this->data);
    }

    public function create(Request $request)
    {
        $this->checkAuthorization($request->user(), 'pages_create');
        $this->data('menuData', $this->pInterface->getAllMenu());
        return view($this->pagePath . 'page.create', $this->data);
    }

    public function store(PageCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'pages_create');
        $this->pInterface->insert($request->all());
        return redirect()->route('manage-page.index');
    }


    public function edit(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'pages_edit');
        $this->data('page', $this->pInterface->get($id));
        $this->data('menuData', $this->pInterface->getAllMenu());
        return view($this->pagePath . 'page.update', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'pages_edit');
        $this->pInterface->update($request->all(), $id);
        return redirect()->route('manage-page.index');
    }


    public function destroy(Request $request, $id)
    {

        $this->checkAuthorization($request->user(), 'pages_delete');
        $this->pInterface->delete($id);
        return redirect()->route('manage-page.index');
    }
}
