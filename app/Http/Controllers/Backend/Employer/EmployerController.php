<?php

namespace App\Http\Controllers\Backend\Employer;

use App\Http\Controllers\Backend\Common\BackendController;
use App\Http\Requests\Employer\EmployerCreateRequest;
use App\Repositories\Employer\EmployerInterface;
use Illuminate\Http\Request;

class EmployerController extends BackendController
{
    protected $empInterface;

    public function __construct(EmployerInterface $empInterface)
    {
        parent::__construct();
        $this->empInterface = $empInterface;
    }

    public function index(Request $request)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $auth = auth()->user();
//        $notification = $auth->unreadNotifications;
//        dd($notification);
        $this->data('employerData', $this->empInterface->all());
        return view($this->pagePath . 'employer.index', $this->data);
    }


    public function create(Request $request)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        return view($this->pagePath . 'employer.create', $this->data);
    }

    public function store(EmployerCreateRequest $request)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $this->empInterface->insert($request->all());
        return redirect()->route('manage-employer.index')->with('success', 'Employer created successfully');
    }

    public function show(string $id)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $this->data('employerData', $this->empInterface->getById($id));
        return view($this->pagePath . 'employer.show', $this->data);
    }


    public function edit(string $id)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $this->data('employerData', $this->empInterface->getById($id));
        return view($this->pagePath . 'employer.update', $this->data);

    }


    public function update(Request $request, string $id)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $request->validate([
            'company_name' => 'required',
            'company_slug' => 'required|unique:employers,company_slug,' . $id,
        ]);
        $this->empInterface->update($id, $request->all());
        return redirect()->route('manage-employer.index')->with('success', 'Employer updated successfully');
    }


    public function destroy(string $id)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
            return redirect()->back();
        }
        $this->empInterface->delete($id);
        return redirect()->route('manage-employer.index')->with('success', 'Employer deleted successfully');
    }


    public function updateStatus(Request $request)
    {
        if (auth()->user()->account_type->name == 'job_seeker') {
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
