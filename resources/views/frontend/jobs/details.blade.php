@extends('frontend.app')
@section('content')
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-md-9">
                <h1>{{$jobData->title}}</h1>
                @if($jobData->image)
                    <img src="{{url($jobData->image)}}" alt="">
                @endif
                <p>{!! $jobData->description !!}</p>

                <hr>

                @if(!auth()->check())
                    <a href="{{route('login')}}">
                        <button class="btn btn-primary">Login to Apply</button>
                    </a>
                @endif
                @if(auth()->check())
                    <form action="{{route('apply',$jobData->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" value="{{$jobData->id}}">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                   value="{{auth()->user()->name}}" readonly
                                   class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                   value="{{auth()->user()->email}}" readonly
                                   class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label for="cover_letter">Cover Letter</label>
                            <textarea name="cover_letter" id="cover_letter" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="resume">Resume:
                                <span class="text-danger">
                                    @if($errors->has('resume'))
                                        {{$errors->first('resume')}}
                                    @endif
                                </span>

                            </label>
                            <input type="file" name="resume" id="resume" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>

                @endif
            </div>
        </div>
    </div>

@endsection
