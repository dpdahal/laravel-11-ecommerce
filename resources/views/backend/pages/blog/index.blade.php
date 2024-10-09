@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <h2>
                                <i class="bi bi-eye-fill"></i> Blogs List
                                <a href="{{route('manage-blog.create')}}"
                                   class="btn btn-primary btn-sm float-end">
                                    <i class="bi bi-plus-circle"></i> Add Blog</a>
                            </h2>
                        </div>

                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>S.n</th>
                                        <th>Title</th>
                                        <th>Total Page</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($postsData->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                We could not find any data
                                                <br>
                                                <a href="{{route('manage-blog.index')}}">Refresh
                                                    page</a>

                                            </td>
                                        </tr>
                                    @endif
                                    @foreach($postsData as $posts)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="">{{$posts->title}}</a>
                                            </td>
                                            <td>
                                                @if($posts->totalChildPage()<1)
                                                    <span class="badge bg-danger"> No Page</span>
                                                @else
                                                    <a class="btn btn-primary btn-sm"
                                                       href="{{route('post-child',$posts->id)}}"> {{$posts->totalChildPage()}}
                                                        View</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($posts->image)
                                                    <img src="{{url($posts->image)}}" alt=""
                                                         style="width: 100px;">
                                                @else
                                                    <span class="badge bg-danger"> No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($posts->postCategory->count()<1)
                                                    <span class="badge bg-danger"> Uncategorized</span>
                                                @else
                                                    @foreach($posts->postCategory as $category)
                                                        <span class="badge bg-primary"> {{$category->name}}</span>
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td style="width: 12%;">
                                                <a href="{{route('manage-blog.show',$posts->id)}}"
                                                   class="btn btn-primary btn-sm" title="Show Blog">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a href="{{route('manage-blog.edit',$posts->id)}}"
                                                   class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{route('create-post-page',$posts->id)}}"
                                                   title="Add Post Page"
                                                   class="btn btn-info btn-sm">
                                                    <i class="bi bi-plus"></i>
                                                </a>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


