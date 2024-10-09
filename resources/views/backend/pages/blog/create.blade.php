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
                                    <h2> <i class="bi bi-plus-circle"></i> Add Blog
                                        <a href="{{route('manage-blog.index')}}"
                                           class="btn btn-success btn-sm float-end">
                                            <i class="bi bi-eye-fill"></i> Show Blog</a>
                                    </h2>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-blog.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group mb-3">
                                                <label for="title">Title:
                                                    <a style="color: red;">{{$errors->first('title')}}</a>
                                                </label>
                                                <input type="text" id="title" name="title"
                                                       class="form-control"
                                                       value="{{old('title')}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="slug">Slug:
                                                    <a style="color: red;">{{$errors->first('slug')}}</a>
                                                </label>
                                                <input type="text" id="slug" name="slug"
                                                       class="form-control"
                                                       value="{{old('slug')}}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="summary">Excerpt</label>
                                                <textarea name="excerpt" id="summary"
                                                          class="form-control">{{old('excerpt')}}</textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label for="status">Status</label>
                                                <select name="is_published" id="status" class="form-control">
                                                    <option value="0"
                                                        {{old('is_published') == 0 ? 'selected' : ''}}>Draft
                                                    </option>
                                                    <option value="1"
                                                        {{old('is_published') == 1 ? 'selected' : ''}}
                                                    >published
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @include('backend.pages.blog.category-lib.category-lib-index')
                                            </div>
                                            <div class="form-group mt-2 mb-3">
                                                <label for="is_commentable">is commentable</label>
                                                <select name="is_commentable" id="is_commentable"
                                                        class="form-control">
                                                    <option value="0"
                                                        {{old('is_commentable') == 0 ? 'selected' : ''}}>No
                                                    </option>
                                                    <option value="1"
                                                        {{old('is_commentable') == 1 ? 'selected' : ''}}>Yes
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="meta_title">Meta Title:</label>
                                                <input type="text" id="meta_title" name="meta_title"
                                                       class="form-control"
                                                       value="{{old('meta_title')}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="meta_description">Meta Description:</label>
                                                <textarea name="meta_description" id="meta_description"
                                                          class="form-control">{{old('meta_description')}}</textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="meta_keywords"> Meta Keywords</label>
                                                <div class="tag-input-container">
                                                    <input type="text" class="form-control"
                                                           name="meta_keywords"
                                                           value="{{old('meta_keywords')}}"
                                                           id="meta_keywords">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-success w-100">
                                                <i class="bi bi-plus-circle"></i> Add Blog
                                            </button>
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
    @parent
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

