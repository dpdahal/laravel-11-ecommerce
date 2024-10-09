<?php
$columnName = "image";
?>
@extends('backend.master.main')
@section('content')
    <style>
        .category_box {
            height: 300px;
            overflow: auto;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
    </style>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-2 mt-3">
                                    <h2><i class="bi bi-pencil-square"></i> Update Blogs
                                        <a href="{{route('manage-blog.index')}}" class="btn btn-success btn-sm float-end">
                                            <i class="bi bi-eye-fill"></i> View All Blogs
                                        </a>
                                    </h2>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-blog.update',$blogData->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group mb-3">
                                                <label for="title">Title:
                                                    <a style="color: red;">{{$errors->first('title')}}</a>
                                                </label>
                                                <input type="text" id="title" name="title"
                                                       class="form-control"
                                                       value="{{$blogData->title}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="slug">Slug:
                                                    <a style="color: red;">{{$errors->first('slug')}}</a>
                                                </label>
                                                <input type="text" id="slug" name="slug"
                                                       class="form-control"
                                                       value="{{$blogData->slug}}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="summary">Excerpt</label>
                                                <textarea name="excerpt" id="summary"
                                                          class="form-control">{{$blogData->excerpt}}</textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{$blogData->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="status">Status</label>
                                                        <select name="is_published" id="status" class="form-control">
                                                            <option value="0"
                                                                {{$blogData->is_published == 0 ? 'selected' : ''}}>Draft
                                                            </option>
                                                            <option value="1"
                                                                {{$blogData->is_published == 1 ? 'selected' : ''}}>
                                                                published
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="category_box">
                                                        <h1 style="font-size: 20px;margin-bottom: 20px; font-weight: bold;">
                                                            Category</h1>

                                                        @foreach($categoryData as $category)
                                                            @if(in_array($category->id,$blogData->postCategory->pluck('id')->toArray()))

                                                                <label>
                                                                    <input type="checkbox" name="category[]"
                                                                           value="{{$category->id}}"
                                                                           checked> {{$category->name}}
                                                                </label>
                                                                <br>
                                                            @else
                                                                <label>
                                                                    <input type="checkbox" name="category[]"
                                                                           value="{{$category->id}}"> {{$category->name}}
                                                                </label>
                                                                <br>
                                                            @endif
                                                        @endforeach

                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        @include('backend.layouts.update-image',['tableName'=>$blogData->getTable(),'id'=>$blogData->id])
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="meta_title">Meta Title:</label>
                                                    <input type="text" id="meta_title" name="meta_title"
                                                           class="form-control"
                                                           value="{{$blogData->meta_title}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="meta_description">Meta Description:</label>
                                                    <textarea name="meta_description" id="meta_description"
                                                              class="form-control">{{$blogData->meta_description}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-2">
                                                    <button class="btn btn-primary w-100">Update Blog</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('summary', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

            $('#addmorecategory').click(function () {
                $('.box-section').toggle();
            });

        });


    </script>
@endsection


