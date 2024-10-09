<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Banner\BannerCreateRequest;
use App\Repositories\Banner\BannerInterface;
use Illuminate\Http\Request;

class BannerController extends BackendController
{
    protected $bannerInterface;

    public function __construct(BannerInterface $bannerInterface)
    {
        parent::__construct();
        $this->bannerInterface = $bannerInterface;
    }

    public function index(Request $request)
    {
        $this->checkAuthorization($request->user(), 'banners_list');
        $this->data('banners', $this->bannerInterface->all());
        return view($this->pagePath . 'banner.index', $this->data);
    }

    public function show(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'banners_list');
        $this->data('banner', $this->bannerInterface->get($id));
        return view($this->pagePath . 'banner.show', $this->data);
    }

    public function create(Request $request)
    {
        $this->checkAuthorization($request->user(), 'banners_create');
        return view($this->pagePath . 'banner.create', $this->data);
    }

    public function store(BannerCreateRequest $request)
    {
        $this->checkAuthorization($request->user(), 'banners_create');
        $this->bannerInterface->insert($request->all());
        return redirect()->route('manage-banner.index');
    }


    public function edit(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'banners_edit');
        $this->data('banner', $this->bannerInterface->get($id));
        return view($this->pagePath . 'banner.update', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'banners_edit');
        $this->bannerInterface->update($request->all(), $id);
        return redirect()->route('manage-banner.index');
    }


    public function destroy(Request $request, $id)
    {
        $this->checkAuthorization($request->user(), 'banners_delete');
        $this->bannerInterface->delete($id);
        return redirect()->route('manage-banner.index');
    }


}
