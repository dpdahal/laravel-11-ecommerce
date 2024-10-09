<?php

function getLimitDescription($text, $limit = 1000)
{
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    } else {
        return $text;
    }
}

?>

@extends('frontend.app')

@section('content')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        @foreach($bannerData as $key=>$value)
            @if($key%2==0)
                <div class="header-carousel-item bg-success">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-7 animated fadeInLeft">
                                    <div class="text-sm-center text-md-start">
                                        <h4 class="text-white text-uppercase fw-bold mb-4">Welcome To LifeSure</h4>
                                        <h1 class="display-1 text-white mb-4">
                                            {{$value->title}}
                                        </h1>
                                        <p class="mb-5 fs-5">
                                            {!! getLimitDescription($value->description,300) !!}
                                        </p>
                                        <div
                                                class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">

                                            <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2"
                                               href="{{route('banner',$value->slug)}}">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 animated fadeInRight">
                                    <div class="calrousel-img" style="object-fit: cover;">
                                        @if($value->image)
                                            <img src="{{url($value->image)}}" class="img-fluid w-100" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="header-carousel-item bg-success">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                                <div class="col-lg-5 animated fadeInLeft">
                                    <div class="calrousel-img">
                                        @if($value->image)
                                            <img src="{{url($value->image)}}" class="img-fluid w-100" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-7 animated fadeInRight">
                                    <div class="text-sm-center text-md-end">
                                        <h1 class="display-1 text-white mb-4">{{$value->title}}</h1>
                                        <p class="mb-5 fs-5">
                                            {!! getLimitDescription($value->description,300) !!}
                                        </p>
                                        <div
                                                class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">

                                            <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2"
                                               href="{{route('banner',$value->slug)}}"> Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <!-- Carousel End -->

    @include('frontend.home.home-component')




    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">From Blog</h4>
                <h1 class="display-4 mb-4">News And Updates</h1>

            </div>
            <div class="row g-4 justify-content-center">
                @foreach($homeBlogData as $blog)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                @if($blog->image)
                                    <img src="{{url($blog->image)}}" style="height: 250px;"
                                         class="img-fluid rounded-top w-100" alt="">
                                @endif
                                <div class="blog-categiry py-2 px-4">
                                    <span>Business</span>
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <div class="blog-comment d-flex justify-content-between mb-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span>
                                        {{$blog->user->name}}
                                    </div>
                                    <div class="small"><span class="fa fa-calendar text-primary"></span>
                                        {{$blog->created_at->format('d M Y')}}
                                    </div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span>

                                        Comments
                                    </div>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">
                                    {{$blog->title}}
                                </a>
                                <p class="mb-3">
                                    {!! getLimitDescription($blog->description,400) !!}
                                </p>
                                <a href="{{route('blog',$blog->slug)}}" class="btn p-0">Read More <i
                                            class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Our Team</h1>

            </div>
            <div class="row g-4">
                @foreach($outTeamData as $team)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                @if($team->user->image)
                                    <img src="{{url($team->user->image)}}" class="img-fluid rounded-top w-100" alt="">
                                @endif
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                                class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                                class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                                class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">
                                    {{$team->user->name}}
                                </h4>
                                <p class="mb-0">
                                    {{$team->memberType->type}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="display-4 mb-4">What Our Customers Are Saying</h1>

            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach($testimonialData as $testimonial)
                    <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                            <div class="col-4  col-lg-4 col-xl-3">
                                <div class="h-100">
                                    @if($testimonial->image)
                                        <img src="{{url($testimonial->image)}}" class="img-fluid h-100 rounded"
                                             style="object-fit: cover;"
                                             alt="{{$testimonial->image}}">
                                    @else
                                        <img src="{{url('icons/notfound.png')}}"
                                             class="img-fluid h-100 rounded"
                                             style="object-fit: cover;"
                                             alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-8 col-lg-8 col-xl-9">
                                <div class="d-flex flex-column my-auto text-start p-4">
                                    <h4 class="text-dark mb-0">{{$testimonial->name}}</h4>
                                    <p class="mb-3">{{$testimonial->designation}}</p>

                                    <p class="mb-0">
                                        {!! $testimonial->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection
