@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3 mb-3">
                        <div class="col-md-10">
                            <h3><i class="bi bi-newspaper"></i> Banner Details</h3>

                        </div>
                        <div class="col-md-2">
                            <a href="{{route('manage-banner.index')}}"
                               class="btn btn-primary pull-right">
                                <i class="bi bi-arrow-right-circle-fill"></i> Back </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{$banner->title}}</h3>
                            <p class="font-weight-bold">
                                <i class="bi bi-calendar"></i> {{$banner->created_at->format('d M Y')}}
                            </p>
                            @if($banner->image)
                                <img src="{{url($banner->image)}}" alt="" width="100%">
                            @endif
                            <p>
                                {!! $banner->description !!}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection






