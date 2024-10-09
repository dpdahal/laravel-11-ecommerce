@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-shop"></i> Add Company

                                <a href="{{route('manage-employer.index')}}" class="btn btn-primary btn-sm float-end">
                                    Show Company </a>

                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('manage-employer.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <label for="title">Company Name:
                                                <span class="text-danger"> {{$errors->first('company_name')}}</span>
                                            </label>
                                            <input type="text" id="title" value="{{old('company_name')}}"
                                                   class="form-control"
                                                   name="company_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="slug"> Slug:
                                                <span class="text-danger"> {{$errors->first('company_slug')}}</span>
                                            </label>
                                            <input type="text" id="slug" value="{{old('company_slug')}}"
                                                   class="form-control"
                                                   name="company_slug">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="company_description">Description:
                                                <a style="color: red;">{{$errors->first('company_description')}}</a>
                                            </label>
                                            <textarea name="company_description" placeholder="Description"
                                                      id="company_description"
                                                      class="form-control">{{old('company_description')}}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="company_email">Company Email:
                                                <span class="text-danger"> {{$errors->first('company_email')}}</span>
                                            </label>
                                            <input type="text" id="company_email" value="{{old('company_email')}}"
                                                   class="form-control"
                                                   name="company_email">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="company_phone">Company Phone:
                                                <span class="text-danger"> {{$errors->first('company_phone')}}</span>
                                            </label>
                                            <input type="text" id="company_phone" value="{{old('company_phone')}}"
                                                   class="form-control"
                                                   name="company_phone">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="company_address">Company Address:
                                                <span class="text-danger"> {{$errors->first('company_address')}}</span>
                                            </label>
                                            <input type="text" id="company_address" value="{{old('company_address')}}"
                                                   class="form-control"
                                                   name="company_address">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="company_logo">Store Logo:
                                                <span class="text-danger"> {{$errors->first('company_logo')}}</span>
                                            </label>
                                            <input type="file" id="company_logo" value="{{old('company_logo')}}"
                                                   class="form-control"
                                                   name="company_logo">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="register_date"> Register date:
                                                <span class="text-danger"> {{$errors->first('register_date')}}</span>
                                            </label>
                                            <input type="date" id="register_date" value="{{old('register_date')}}"
                                                   class="form-control"
                                                   name="register_date">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="company_website">Company Website:
                                                <span class="text-danger"> {{$errors->first('company_website')}}</span>
                                            </label>
                                            <input type="text" id="company_website" value="{{old('company_website')}}"
                                                   class="form-control"
                                                   name="company_website">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100">Add Company</button>
                                    </div>
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

            CKEDITOR.replace('company_description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

        });
    </script>
@endsection
