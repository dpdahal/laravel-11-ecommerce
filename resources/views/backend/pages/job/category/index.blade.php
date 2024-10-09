@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">

                            <h2>
                                <i class="bi bi-newspaper"></i> Job Category
                                <a href="{{route('manage-job-category.create')}}"
                                   class="float-end btn btn-primary btn-sm">Add Category</a>
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
                                    <th>Name</th>
                                    <th>Posted By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categoryData->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            We could not find any data
                                            <br>
                                            <a href="{{route('manage-job-category.index')}}">Refresh
                                                page</a>

                                        </td>
                                    </tr>
                                @endif
                                @foreach($categoryData as $key=>$category)
                                    <tr>

                                        <td>{{$category->name}}</td>
                                        <td>{{$category->postedBy->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td style="width: 12%;">
                                            @can('job_categories_show')
                                                <a href="{{route('manage-job-category.show',$category->id)}}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            @endcan
                                            @can('job_categories_edit')
                                                <a href="{{route('manage-job-category.edit',$category->id)}}"
                                                   class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            @endcan

                                        </td>
                                    </tr>
                                    @if($category->child)
                                        @include('backend.pages.job.category.manageChild',['childDataTable' => $category->child])
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{$categoryData->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

