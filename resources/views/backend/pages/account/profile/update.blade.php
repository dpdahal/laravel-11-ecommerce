<?php
$columnName = "image";
?>
@extends('backend.master.main')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <label for="name">Full Name</label>
                                            <input name="name" type="text" class="form-control" id="name"
                                                   value="{{$adminData->name}}">

                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="male"
                                                    {{$adminData->gender=='male' ? 'selected':''}}> Male
                                                </option>
                                                <option
                                                    value="female" {{$adminData->gender=='female' ? 'selected':''}}>
                                                    Female
                                                </option>
                                                <option
                                                    value="other" {{$adminData->gender=='other' ? 'selected':''}}>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="phone_number">Phone</label>
                                            <input name="phone_number" type="text" class="form-control"
                                                   id="phone_number"
                                                   value="{{$adminData->phone_number ?? ''}}">

                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="birthday">Birthday</label>
                                            <input name="birthday" type="date" class="form-control"
                                                   id="birthday"
                                                   value="{{$adminData->birthday ?? ''}}">

                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="Email">Email</label>
                                            <input name="email" type="email" class="form-control" id="Email"
                                                   value="{{$adminData->email}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="description">About</label>
                                            <textarea name="description" class="form-control"
                                                      id="description"
                                                      style="height: 100px">{!! $adminData->description?? '' !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="country_id">Country: <a
                                                    style="color: red;">{{$errors->first('country_id')}}</a></label>
                                            <select name="country_id" id="country_id" class="form-control">
                                                <option value="{{$adminData->country->id}}">
                                                    {{$adminData->country->country_name}}
                                                </option>
                                                @foreach($countryData as $country)
                                                    <option
                                                        value="{{$country->id}}" {{old('country_id') == $country->id ? 'selected' : ''}}>{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group mb-2">
                                            <label for="Address">Address</label>
                                            <input name="address" type="text" class="form-control"
                                                   id="Address"
                                                   value="{{$adminData->address ?? ''}}">

                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="city">City</label>
                                            <input name="city" type="text" class="form-control" id="city"
                                                   value="{{$adminData->city ?? ''}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="Twitter">Twitter </label>
                                            <input name="twitter" type="text" class="form-control"
                                                   id="Twitter"
                                                   value="{{$adminData->twitter ?? ''}}">

                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="Facebook">Facebook</label>
                                            <input name="facebook" type="text" class="form-control"
                                                   id="Facebook"
                                                   value="{{$adminData->facebook ?? ''}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="Instagram">Instagram</label>
                                            <input name="instagram" type="text" class="form-control"
                                                   id="Instagram"
                                                   value="{{$adminData->instagram ?? ''}}">

                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="Linkedin">Linkedin</label>
                                            <input name="linkedin" type="text" class="form-control"
                                                   id="Linkedin"
                                                   value="{{$adminData->linkedin ?? ''}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="profileImage">Profile Image</label>
                                            @include('backend.layouts.update-image',['tableName'=>$adminData->getTable(),'id'=>$adminData->id])

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100">Update Profile</button>
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
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

        });


    </script>
@endsection


