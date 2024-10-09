<?php

$columnName = "image";

?>

@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2 mb-2">
                            <h2>
                                <i class="bi bi-pencil-square"></i> Update Category
                                <a href="{{route('manage-job-category.index')}}" class="btn btn-success btn-sm pull-right">
                                    Back</a>
                            </h2>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('manage-job-category.update',$category->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="name">Name:
                                        <a style="color: red;">{{$errors->first('name')}}</a>
                                    </label>
                                    <input type="text" id="name" name="name"
                                            class="form-control"
                                           value="{{$category->name}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="slug">Slug:
                                        <a style="color: red;">{{$errors->first('slug')}}</a>
                                    </label>
                                    <input type="text" id="slug" name="slug" class="form-control"
                                           value="{{$category->slug}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="icon">Icon:
                                        <a style="color: red;">{{$errors->first('icon')}}</a>
                                    </label>
                                    <input type="text" id="icon" name="icon" class="form-control"
                                           value="{{$category->icon}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="parent_id">parent:
                                        <a style="color: red;">{{$errors->first('parent')}}</a>
                                    </label>

                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="">{{$category->name}}</option>
                                        @foreach($categoryData as $destination)
                                            <option value="{{$destination->id}}">{{$destination->name}}</option>
                                            @if($destination->child)
                                                @include('backend.pages.job.category.nested',['childrenData' => $destination->child])
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description:
                                        <a style="color: red;">{{$errors->first('description')}}</a>
                                    </label>
                                    <textarea id="description" name="description"
                                              class="form-control">{{$category->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    @include('backend.layouts.update-image',['tableName'=>$category->getTable(),'id'=>$category->id])
                                </div>

                                <div class="form-group mb-3">
                                    <button class="btn btn-success">
                                        <i class="bi bi-pencil-square"></i> Update record
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

        });
    </script>
@endsection




