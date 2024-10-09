<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Menu\MenuCreateRequest;
use App\Repositories\Page\MenuInterface;
use Illuminate\Http\Request;

class MenuController extends BackendController
{
    protected $pInterface;

    public function __construct(MenuInterface $pInterface)
    {
        parent::__construct();
        $this->pInterface = $pInterface;
    }

    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'menus_list');
        $this->data('menuData', $this->pInterface->all());
        return view($this->pagePath . 'menu.index', $this->data);
    }

    public function show(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'menus_list');
        $this->data('menu', $this->pInterface->get($id));
        return view($this->pagePath . 'menu.show', $this->data);
    }

    public function create(Request $request)
    {
        $this->checkAuthorization($request->user(), 'menus_create');
        $this->data('menuData', $this->pInterface->getAllMenu());
        return view($this->pagePath . 'menu.create', $this->data);
    }

    public function store(MenuCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'menus_create');
        $this->pInterface->insert($request->all());
        return redirect()->route('manage-menu.index');
    }


    public function edit(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'menus_edit');
        $this->data('menu', $this->pInterface->get($id));
        $this->data('menuParent', $this->pInterface->getAllMenu());
        return view($this->pagePath . 'menu.update', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'menus_edit');
        $this->pInterface->update($request->all(), $id);
        return redirect()->route('manage-menu.index');
    }


    public function destroy(Request $request, $id)
    {
        $total = $this->pInterface->getTotalPage($id);
        if ($total > 0) {
            return redirect()->back()->with('error', 'This menu has ' . $total . ' page(s) so you can not delete this menu');
        } else {
            $this->checkAuthorization($request->user(), 'menus_delete');
            $this->pInterface->delete($id);
            return redirect()->route('manage-menu.index');
        }
    }
}
