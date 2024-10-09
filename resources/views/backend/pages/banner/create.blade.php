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
                                    <h2><i class="bi bi-plus-circle"></i> Add Banner
                                        <a href="{{route('manage-banner.index')}}"
                                           class="btn btn-primary btn-sm float-end">Show
                                            Banner</a>
                                    </h2>
                                    <hr>
                                    @include('backend.layouts.message')
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-banner.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">

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
                                            <div class="form-group mb-3">
                                                <label for="link">Link:
                                                    <a style="color: red;">{{$errors->first('link')}}</a>
                                                </label>
                                                <input type="text" id="link" name="link"
                                                       class="form-control"
                                                       value="{{old('link')}}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{old('description')}}</textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <button class="btn btn-success">
                                                    <i class="bi bi-plus-circle"></i>
                                                    Add Banner
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
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });
        });

    </script>
@endsection

