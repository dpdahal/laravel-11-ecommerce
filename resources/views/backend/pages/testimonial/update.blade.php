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
                                    <h2><i class="bi bi-plus-circle"></i> Update Testimonial</h2>
                                    <hr>
                                    @include('backend.layouts.message')
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('manage-testimonial.update',$testimonial->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="form-group mb-3">
                                                <label for="name">Name:
                                                    <a style="color: red;">{{$errors->first('name')}}</a>
                                                </label>
                                                <input type="text" id="name" name="name"
                                                       class="form-control"
                                                       value="{{$testimonial->name}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="designation">Designation :
                                                    <a style="color: red;">{{$errors->first('designation')}}</a>
                                                </label>
                                                <input type="text" id="designation" name="designation"
                                                       class="form-control"
                                                       value="{{$testimonial->designation}}">
                                            </div>


                                            <div class="form-group mb-2">
                                                <label for="description">Description:
                                                    <a style="color: red;">{{$errors->first('description')}}</a>
                                                </label>
                                                <textarea name="description" placeholder="Description"
                                                          id="description"
                                                          class="form-control">{{$testimonial->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                @include('backend.layouts.update-image',['tableName'=>$testimonial->getTable(),'id'=>$testimonial->id])

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <button class="btn btn-success">
                                                    <i class="bi bi-plus-circle"></i>
                                                    Update Testimonial
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

