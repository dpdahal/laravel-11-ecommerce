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
                                    <h2><i class="bi bi-plus-circle"></i> Update Menu
                                        <a href="{{route('manage-menu.index')}}"
                                           class="btn btn-primary btn-sm float-end">Show
                                            Menu</a>
                                    </h2>
                                    <hr>
                                    @include('backend.layouts.message')
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-menu.update',$menu)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="form-group mb-3">
                                                <label for="title">Name:
                                                    <a style="color: red;">{{$errors->first('name')}}</a>
                                                </label>
                                                <input type="text" id="title" name="name"
                                                       class="form-control"
                                                       value="{{$menu->name}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="slug">Slug:
                                                    <a style="color: red;">{{$errors->first('slug')}}</a>
                                                </label>
                                                <input type="text" id="slug" name="slug"
                                                       class="form-control"
                                                       value="{{$menu->slug}}">
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{$menu->description}}</textarea>
                                            </div>


                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="menu_id">Menu:
                                                    <a style="color: red;">{{$errors->first('menu')}}</a>
                                                </label>
                                                <select name="menu_id" id="menu_id"
                                                        class="form-control">
                                                    <option value="">Select Menu</option>
                                                    @foreach($menuParent as $menu)
                                                        <option value="{{$menu->id}}"
                                                            {{old('menu_id') == $menu->id ? 'selected' : ''}}

                                                        >{{$menu->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="is_header">Is Header:
                                                    <a style="color: red;">{{$errors->first('is_header')}}</a>
                                                </label>
                                                <select name="is_header" id="is_header"
                                                        class="form-control">
                                                    <option value="1"
                                                        {{$menu->is_header == '1' ? 'selected' : ''}}>Yes
                                                    </option>
                                                    <option value="0"
                                                        {{$menu->is_header == '0' ? 'selected' : ''}}>No
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="is_footer">Is Footer:
                                                    <a style="color: red;">{{$errors->first('is_footer')}}</a>
                                                </label>
                                                <select name="is_footer" id="is_footer"
                                                        class="form-control">
                                                    <option value="1"
                                                        {{$menu->is_footer== '1' ? 'selected' : ''}}>Yes
                                                    </option>
                                                    <option value="0"
                                                        {{$menu->is_footer == '0' ? 'selected' : ''}}>No
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="is_home">Is Home:
                                                    <a style="color: red;">{{$errors->first('is_home')}}</a>
                                                </label>
                                                <select name="is_home" id="is_home"
                                                        class="form-control">
                                                    <option value="1"
                                                        {{$menu->is_home == '1' ? 'selected' : ''}}> Yes
                                                    </option>
                                                    <option value="0"
                                                        {{$menu->is_home == '0' ? 'selected' : ''}}>No
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <button class="btn btn-success w-100">
                                                    <i class="bi bi-plus-circle"></i>
                                                    Update Menu
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

