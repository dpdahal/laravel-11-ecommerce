<?php

function getLimitDescription($text, $limit = 300)
{
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    } else {
        return $text;
    }
}


?>


@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <h2>
                                <i class="bi bi-eye-fill"></i> Post Child List
                                <a href=""></a>
                            </h2>
                            <hr>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                @foreach($postsData as $page)
                                    <div class="col-md-4">
                                        <div class="card">
                                            @if($page->image)
                                                <img src="{{url($page->image)}}" style="height: 200px;" class="card-img-top" alt="{{$page->title}}">
                                            @else
                                                <img src="{{url('icons/notfound.png')}}" style="height: 200px;" class="card-img-top" alt="{{$page->title}}">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{$page->title}}

                                                </h5>
                                                <p class="card-text">
                                                    {!! getLimitDescription($page->description) !!}
                                                </p>
                                                <a href="{{route('edit-post-page',$page->id)}}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i> Edit</a>
                                                <a href="{{route('delete-post-page',$page->id)}}"
                                                   class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Delete</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


