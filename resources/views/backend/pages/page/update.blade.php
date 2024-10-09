<?php
$columnName = "image";
?>
@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-2 mt-3">
                                    <h2><i class="bi bi-pencil-square"></i> Update Page
                                        <a href="{{route('manage-page.index')}}"
                                           class="btn btn-success btn-sm float-end">
                                            <i class="bi bi-list"></i> Page Lists
                                        </a>
                                    </h2>
                                    <hr>
                                    @include('backend.layouts.message')
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-page.update',$page->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-8">


                                            <div class="form-group mb-3">
                                                <label for="title">Title:
                                                    <a style="color: red;">{{$errors->first('title')}}</a>
                                                </label>
                                                <input type="text" id="title" name="title"
                                                       class="form-control"
                                                       value="{{$page->title}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="slug">Slug:
                                                    <a style="color: red;">{{$errors->first('slug')}}</a>
                                                </label>
                                                <input type="text" id="slug" name="slug"
                                                       class="form-control"
                                                       value="{{$page->slug}}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="summary">Excerpt</label>
                                                <textarea name="excerpt" id="summary"
                                                          class="form-control">{{$page->excerpt}}</textarea>
                                            </div>


                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{$page->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="menu_id">Menu:
                                                    <a style="color: red;">{{$errors->first('menu')}}</a>
                                                </label>
                                                <select name="menu_id" id="menu_id"
                                                        class="form-control">
                                                    <option value="{{$page->menu->id}}">{{$page->menu->name}}</option>

                                                    @foreach($menuData as $menu)
                                                        <option value="{{$menu->id}}"
                                                            {{old('menu_id') == $menu->id ? 'selected' : ''}}

                                                        >{{$menu->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="0"
                                                        {{$page->status == 0 ? 'selected' : ''}}>Draft
                                                    </option>
                                                    <option value="1"
                                                        {{$page->status == 1 ? 'selected' : ''}}>
                                                        published
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                @include('backend.layouts.update-image',['tableName'=>$page->getTable(),'id'=>$page->id])

                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="meta_title">Meta Title:</label>
                                                <input type="text" id="meta_title" name="meta_title"
                                                       class="form-control"
                                                       value="{{$page->meta_title}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="meta_description">Meta Description:</label>
                                                <textarea name="meta_description" id="meta_description"
                                                          class="form-control">{{$page->meta_description}}</textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-group">
                                                    <label for="youtube_url">Youtube url</label>
                                                    <input type="url" name="youtube_url"
                                                           value="{{$page->youtube_url}}"
                                                           id="youtube_url"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <button class="btn btn-success w-100">
                                                    <i class="bi bi-plus-circle"></i>
                                                    Update Page
                                                </button>
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
        });

    </script>
@endsection

