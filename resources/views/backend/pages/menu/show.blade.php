@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3 mb-3">
                        <div class="col-md-10">
                            <h3><i class="bi bi-newspaper"></i> {{$menu->name}}
                                <p class="font-weight-bold">
                                    <i class="bi bi-calendar"></i> {{$menu->created_at->format('d M Y')}}
                                </p>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('manage-menu.index')}}"
                               class="btn btn-primary pull-right">
                                <i class="bi bi-arrow-right-circle-fill"></i> Back </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            @if($menu->image)
                                <img src="{{url($menu->image)}}" alt="" width="100%">
                            @endif

                            <p>
                                {!! $menu->description !!}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection






