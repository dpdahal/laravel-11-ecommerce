<?php

namespace App\Http\Controllers\Backend\Store;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Store\StoreCreateRequest;
use App\Repositories\Store\StoreInterface;
use Illuminate\Http\Request;

class StoreController extends BackendController
{
    protected $empInterface;

    public function __construct(StoreInterface $empInterface)
    {
        parent::__construct();
        $this->empInterface = $empInterface;
    }

    public function index(Request $request)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        $auth = auth()->user();
//        $notification = $auth->unreadNotifications;
//        dd($notification);
        $this->data('storeData', $this->empInterface->all());
        return view($this->pagePath . 'store.index', $this->data);
    }


    public function create(Request $request)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        return view($this->pagePath . 'store.create', $this->data);
    }

    public function store(StoreCreateRequest $request)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        $this->empInterface->insert($request->all());
        return redirect()->route('manage-store.index')->with('success', 'Store created successfully');
    }

    public function show(string $id)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $this->data('storeData', $this->empInterface->getById($id));
        return view($this->pagePath . 'store.show', $this->data);
    }


    public function edit(string $id)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        $this->data('storeData', $this->empInterface->getById($id));
        return view($this->pagePath . 'store.update', $this->data);

    }


    public function update(Request $request, string $id)
    {
        if (auth()->user()->account_type->name == 'store_seeker') {
            return redirect()->back();
        }
        $request->validate([
            'company_name' => 'required',
            'company_slug' => 'required|unique:stores,company_slug,' . $id,
        ]);
        $this->empInterface->update($id, $request->all());
        return redirect()->route('manage-store.index')->with('success', 'Store updated successfully');
    }


    public function destroy(string $id)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        $this->empInterface->delete($id);
        return redirect()->route('manage-store.index')->with('success', 'Store deleted successfully');
    }


    public function updateStatus(Request $request)
    {
        if (auth()->user()->account_type->name == 'customer') {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $status = '';
            if (isset($_POST['pending'])) {
                $status = 'pending';
            }
            if (isset($_POST['approved'])) {
                $status = 'approved';
            }

            if (isset($_POST['rejected'])) {
                $status = 'rejected';
            }
            $data['status'] = $status;
            $this->empInterface->updateStatusupdateStatus($id, $data);
            return redirect()->back()->with('success', 'Status updated successfully');
        } else {
            return redirect()->back();
        }


    }
}
