@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h2>
                                <i class="bi bi-plus-circle"></i> Job Category
                                <a href="{{route('manage-job-category.index')}}"
                                   class="float-end btn btn-primary btn-sm">Show Category</a>
                            </h2>

                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">

                            @can('job_categories_create')

                                <form action="{{route('manage-job-category.store')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="title">Name:
                                            <a style="color: red;">{{$errors->first('name')}}</a>
                                        </label>
                                        <input type="text" id="title" name="name" class="form-control"
                                               value="{{old('name')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="slug">Slug:
                                            <a style="color: red;">{{$errors->first('slug')}}</a>
                                        </label>
                                        <input type="text" id="slug" name="slug" class="form-control"
                                               value="{{old('slug')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="parent_id">parent:
                                            <a style="color: red;">{{$errors->first('parent')}}</a>
                                        </label>

                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="">Select a parent category</option>
                                            @foreach($categoryData as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @if($category->child)
                                                    @include('backend.pages.job.category.nested',['childrenData' => $category->child])
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="icon">Icon:
                                            <a style="color: red;">{{$errors->first('icon')}}</a>
                                        </label>
                                        <input type="text" id="icon" name="icon" class="form-control"
                                               value="{{old('icon')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Description:
                                            <a style="color: red;">{{$errors->first('description')}}</a>
                                        </label>
                                        <textarea id="description" name="description"
                                                  class="form-control">{{old('description')}}</textarea>
                                    </div>


                                    <div class="form-group mb-3">
                                        <button class="btn btn-success">
                                            <i class="bi bi-plus-circle"></i> Add Job Category
                                        </button>
                                    </div>

                                </form>
                        </div>
                        @endcan

                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

        });
    </script>
@endsection




