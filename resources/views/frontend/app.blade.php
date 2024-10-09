<?php

function getLimitSetting($text, $limit = 300)
{
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    } else {
        return $text;
    }
}

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {!! SEO::generate() !!}
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
            rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{url('frontend-assets/lib/animate/animate.min.css')}}"/>
    <link href="{{url('frontend-assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend-assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{url('icons/logo.svg')}}">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('frontend-assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('frontend-assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Top Bar Start -->
<div class="container-fluid top-bar-section px-0 px-lg-4  py-2 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <div class="border-end border-primary pe-3">
                        <a href="tel:{{$settingData->phone ?? ''}}" class="text-muted small">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            {{$settingData->phone ?? ''}}
                        </a>
                    </div>
                    <div class="ps-3">
                        <a href="mailto:{{$settingData->email ?? ''}}" class="text-muted small"><i
                                    class="fas fa-envelope text-primary me-2"></i>
                            {{$settingData->email ?? ''}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end">
                    <div class="d-flex border-end border-primary pe-3">
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{route('upload-resume')}}" class="btn p-0  text-primary me-0">Upload Your Resume</a>
                    </div>
                    <div class="dropdown ms-3">
                        @if(auth()->check())
                            <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"
                               aria-expanded="false"><small>
                                    <i class="fas fa-user-plus text-primary me-2"></i> {{auth()->user()->name}}</small></a>
                            <div class="dropdown-menu rounded" style="">
                                <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button href="{{route('logout')}}" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"
                               aria-expanded="false"><small>
                                    <i class="fas fa-user-plus text-primary me-2"></i> Account</small></a>
                            <div class="dropdown-menu rounded" style="">
                                <a href="{{route('login')}}" class="dropdown-item">Login</a>
                                <a href="{{route('register')}}" class="dropdown-item">Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{route('index')}}" class="d-block me-5">
                <img src="{{url('icons/logo.svg')}}" width="100px" class="img-fluid" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                    @foreach($headerMenuData as $menu)
                        <a href="{{url($menu->slug)}}" class="nav-item nav-link">{{$menu->name}}</a>
                    @endforeach
                    <a href="{{route('jobs')}}" class="nav-item nav-link"> Jobs</a>
                    <a href="{{route('blog')}}" class="nav-item nav-link">Blog</a>
                    <a href="{{route('faq')}}" class="nav-item nav-link">Faq</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                    <div class="nav-btn ps-5 ms-5">
                        <button class="btn-search btn btn-success btn-md-square rounded-circle flex-shrink-0"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center bg-primary">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                           aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

@yield('content')


<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-9">
                <div class="mb-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-5">
                            <div class="footer-item">
                                <a href="{{route('index')}}" class="p-0">
                                    <h3 class="text-white">
                                        {{ucfirst($settingData->name ?? '')}}
                                    </h3>
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                                <p class="text-white mb-4">
                                    {!! getLimitSetting($settingData->description ?? "") !!}
                                </p>
                                <div class="footer-btn d-flex">
                                    <a class="btn btn-md-square rounded-circle me-3"
                                       href="{{$settingData->facebook ?? ''}}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                       href="{{$settingData->twitter ?? ""}}"><i
                                                class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                       href="{{$settingData->instagram ?? ''}}"><i
                                                class="fab fa-instagram"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                       href="{{$settingData->linkedin ?? ''}}"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3"
                                       href="{{$settingData->youtube ?? ''}}">
                                        <i class="fab fa-youtube"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 offset-xl-1">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Useful Links</h4>
                                @foreach($footerMenuData as $menu)
                                    <a href="{{url($menu->slug)}}"><i
                                                class="fas fa-angle-right me-2"></i> {{ucfirst($menu->name)}}</a>
                                @endforeach

                                <a href="{{route('faq')}}"><i class="fas fa-angle-right me-2"></i> FAQ's</a>
                                <a href="{{route('blog')}}"><i class="fas fa-angle-right me-2"></i> Blogs</a>
                                <a href="{{route('contact')}}"><i class="fas fa-angle-right me-2"></i> Contact</a>
                                <a href="{{route('upload-resume')}}"><i class="fas fa-angle-right me-2"></i> Upload Your
                                    Resume</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div
                                                class="btn-xl-square bg-success text-white  border rounded border-light p-4 me-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Address</h4>
                                            <p class="mb-0 text-light">
                                                {{$settingData->address ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div
                                                class="btn-xl-square bg-success text-white rounded border border-light p-4 me-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Mail Us</h4>
                                            <p class="mb-0 text-light">
                                                {{$settingData->email ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div
                                                class="btn-xl-square bg-success text-white  border rounded border-light p-4 me-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Telephone</h4>
                                            <p class="mb-0 text-light">
                                                {{$settingData->phone ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Newsletter</h4>
                    <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</p>
                    <div class="position-relative rounded-pill mb-4">
                        <input class="form-control  w-100 py-3 ps-4 pe-5" type="text"
                               placeholder="Enter your email">
                        <button type="button"
                                class="btn btn-success position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-end mb-md-0">
                <span class="text-light"><a href="#" class="border-bottom text-light"><i
                                class="fas fa-copyright text-light me-2"></i>{{ucfirst($settingData->name) ?? ''}}</a>, {{date('Y')}} All right reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-start text-white">
                Designed By <a class="border-bottom text-light" href="">Dp Dahal</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('frontend-assets/lib/wow/wow.min.js')}}"></script>
<script src="{{url('frontend-assets/lib/easing/easing.min.js')}}"></script>
<script src="{{url('frontend-assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{url('frontend-assets/lib/counterup/counterup.min.js')}}"></script>
<script src="{{url('frontend-assets/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{url('frontend-assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>


<!-- Template Javascript -->
<script src="{{url('frontend-assets/js/main.js')}}"></script>
</body>

</html>
