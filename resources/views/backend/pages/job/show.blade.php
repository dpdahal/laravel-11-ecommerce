@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">

                            <h2>
                                <i class="bi bi-newspaper"></i> Job Details
                                <a href="{{route('manage-job.index')}}"
                                   class="float-end btn btn-primary btn-sm">Job List</a>
                            </h2>

                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{$jobData->title}}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{$jobData->slug}}</td>
                                </tr>
                                <tr>
                                    <th>number_of_openings</th>
                                    <td>{{$jobData->number_of_openings}}</td>
                                </tr>
                                <tr>
                                    <th>salary</th>
                                    <td>{{$jobData->salary}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>
                                        @if($jobData->jobCategory)
                                            <span class="badge bg-primary">{{$jobData->jobCategory->name}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>
                                        @if($jobData->jobCompany)
                                            <strong>{{$jobData->jobCompany->company_name}}</strong>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Job Type</th>
                                    <td>
                                        @if($jobData->jobType)
                                            <span class="badge bg-primary">{{$jobData->jobType->type}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Job Level</th>
                                    <td>
                                        @if($jobData->jobLevel)
                                            <span class="badge bg-primary">{{$jobData->jobLevel->name}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Education</th>
                                    <td>
                                        @if($jobData->jobEducation)
                                            <span class="badge bg-primary">
                                                    {{$jobData->jobEducation->name}}
                                                </span>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th>Experience</th>
                                    <td>
                                        @if($jobData->jobExperience)
                                            <span class="badge bg-primary">{{$jobData->jobExperience->name}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Job Skill</th>
                                    <td>
                                        @if($jobData->jobSkills)
                                            @foreach($jobData->jobSkills as $js)
                                                <span class="badge bg-primary">{{$js->name}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>postedBy</th>
                                    <td>{{$jobData->postedBy->name}}</td>
                                </tr>


                                <tr>
                                    <th>description</th>
                                    <td>
                                        {!! $jobData->description  !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>location</th>
                                    <td>{{$jobData->location}}</td>
                                </tr>
                                <tr>
                                    <th>status</th>
                                    <td>{{$jobData->status}}</td>
                                </tr>
                                <tr>
                                    <th>start_date</th>
                                    <td>{{$jobData->start_date}}</td>
                                </tr>
                                <tr>
                                    <th>end_date</th>
                                    <td>{{$jobData->end_date}}</td>
                                </tr>
                                <tr>
                                    <th>meta_title</th>
                                    <td>{{$jobData->meta_title}}</td>
                                </tr>
                                <tr>
                                    <th>meta_description</th>
                                    <td>{{$jobData->meta_description}}</td>
                                </tr>
                                <tr>
                                    <th>meta_keywords</th>
                                    <td>{{$jobData->meta_keywords}}</td>
                                </tr>
                                <tr>
                                    <th>is_featured</th>
                                    <td>
                                        @if($jobData->is_featured == 1)
                                            <span class="badge bg-primary">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

