@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2 mb-4">
                            <h2>
                                <i class="bi bi-eye-fill"></i> Category Details
                                <a href="{{route('manage-category.index')}}" class="btn btn-primary pull-right">Back</a>
                            </h2>
                            <hr>
                        </div>

                    </div>
                    <div class="col-row">
                        <div class="col-md-8">
                            <h1>{{$category->name}}</h1>
                            <h3>{{$category->slug}}</h3>
                            <p class="paragraph-image">
                                {!! $category->description !!}
                            </p>
                        </div>
                        <div class="col-md-4">
                            @if($category->image)
                                <img src="{{url($category->image)}}" alt="image not found" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-12 mt-5 mb-5">
                            <hr>
                            <form action="{{route('manage-category.destroy',$category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure ?')">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection






