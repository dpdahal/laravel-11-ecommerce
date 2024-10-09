@extends('frontend.app')

@section('content')

    <div class="container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <h1>Upload Your Resume</h1>
                @include('lib.message')
            </div>
            <div class="col-md-8">
                <form action="{{route('upload-resume')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Name
                            <span class="text-danger">*
                            {{$errors->first('name')}}
                        </span>
                        </label>
                        <input type="text" class="form-control" id="name"
                               name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email
                            <span class="text-danger">*
                            {{$errors->first('email')}}
                        </span>
                        </label>
                        <input type="email" class="form-control" id="email"
                               name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone">Phone
                            <span class="text-danger">
                            {{$errors->first('phone')}}
                        </span>
                        </label>
                        <input type="text" class="form-control" id="phone"
                               name="phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="resume">Resume
                            <span class="text-danger">*
                            {{$errors->first('resume')}}
                        </span>
                        </label>
                        <input type="file" class="form-control" id="resume"
                               name="resume">
                    </div>
                    <div class="form-group mb-2">
                        <label for="message">Message
                            <span class="text-danger">
                            {{$errors->first('message')}}
                        </span>
                        </label>
                        <textarea class="form-control" id="message"
                                  name="message">{{old('message')}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-primary  w-100">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
