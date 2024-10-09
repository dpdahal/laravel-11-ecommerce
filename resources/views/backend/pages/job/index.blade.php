@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">

                            <h2>
                                <i class="bi bi-newspaper"></i> Job List
                                <a href="{{route('manage-job.create')}}"
                                   class="float-end btn btn-primary btn-sm">Add Job</a>
                            </h2>

                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Job Type</th>
                                    <th>Number Of Openings</th>
                                    <th>Posted By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($jobsData->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No data found</td>
                                    </tr>
                                @else
                                    @foreach($jobsData as $key => $job)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                @if($job->jobCompany)
                                                    <strong>
                                                        {{$job->jobCompany->company_name}}
                                                    </strong>
                                                @endif
                                            </td>
                                            <td>{{$job->title}}</td>
                                            <td>
                                                @if($job->jobCategory)
                                                    <span class="badge bg-primary">{{$job->jobCategory->name}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($job->jobType)
                                                    <span class="badge bg-primary">{{$job->jobType->type}}</span>
                                                @endif

                                            </td>
                                            <td>{{$job->number_of_openings}}</td>
                                            <td>{{$job->postedBy->name}}</td>
                                            <td style="width: 12%;">

                                                <a href="{{route('manage-job.show', $job->id)}}"
                                                   class="btn btn-info btn-sm" title="view">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a href="{{route('manage-job.edit', $job->id)}}"
                                                   class="btn btn-primary btn-sm" title="Update">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <form action="{{route('manage-job.destroy', $job->id)}}" method="post"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" title="Delete Job"
                                                            onclick="return confirm('Are you sure?')">
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

