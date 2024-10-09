@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-shop"></i> Company List
                                <a href="{{route('manage-employer.create')}}" class="btn btn-primary btn-sm float-end">
                                    <i class="bi bi-plus-circle"></i> Add Company</a>


                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-hover datatable">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Phone</th>
                                    <th>Status</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($employerData)
                                    @foreach($employerData as $key=>$emp)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$emp->company_name}}</td>
                                            <td>{{$emp->company_email}}</td>
                                            <td>
                                                {{$emp->company_phone}}
                                            </td>
                                            <td>
                                                {{$emp->status}}

                                                @if(auth()->user()->account_type->name=='admin')
                                                    <hr>
                                                    <form action="{{route('manage-employer-update-status')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$emp->id}}">
                                                        <button name="pending" class="btn btn-sm btn-danger">Pending
                                                        </button>
                                                        <button name="approved" class="btn btn-sm btn-success">Approved</button>
                                                        <button name="rejected" class="btn btn-sm btn-warning">Rejected</button>

                                                    </form>
                                                @endif

                                            </td>
                                            <th>
                                                @if($emp->company_logo)
                                                    <img src="{{url($emp->company_logo)}}" alt="Image"
                                                         style="width: 50px; height: 50px;">

                                                @endif
                                            </th>
                                            <td style="width: 12%;">
                                                <a href="{{route('manage-employer.show',$emp->id)}}" title="View Record"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a href="{{route('manage-employer.edit',$emp->id)}}" title="Edit Record"
                                                   class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{route('manage-employer.destroy',$emp->id)}}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
