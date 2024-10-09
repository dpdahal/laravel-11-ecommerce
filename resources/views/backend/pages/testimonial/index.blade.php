@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-people-fill"></i> Testimonial List
                                <a href="{{route('manage-testimonial.create')}}"
                                   class="btn btn-success btn-sm float-end">Add
                                    Testimonial</a>

                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-hover datatable">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonial as $key=>$ts)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$ts->name}}</td>
                                        <td>
                                            @if($ts->image)
                                                <img src="{{url($ts->image)}}" alt="" style="width: 100px;">

                                            @endif
                                        </td>
                                        <td style="width: 12%;">
                                            <a href="{{route('manage-testimonial.show',$ts->id)}}"
                                               class="btn btn-info btn-sm" title="views">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{route('manage-testimonial.edit',$ts->id)}}"
                                               class="btn btn-primary btn-sm" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{route('manage-testimonial.destroy',$ts->id)}}" method="post"
                                                  style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
