@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-image-fill"></i> Banner List
                                @can('banners_create')
                                    <a href="{{route('manage-banner.create')}}"
                                       class="btn btn-success btn-sm float-end">
                                        <i class="bi bi-plus-circle"></i> Add Banner</a>
                                @endcan

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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $key=>$banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$banner->title}}</td>
                                        <td>
                                            @if($banner->image)
                                                <img src="{{url($banner->image)}}" alt="" style="width: 100px;">

                                            @endif
                                        </td>
                                        <td style="width: 12%;">
                                            @can('banners_show')
                                                <a href="{{route('manage-banner.show',$banner->id)}}"
                                                   class="btn btn-info btn-sm" title="views">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            @endcan
                                            @can('banners_edit')
                                                <a href="{{route('manage-banner.edit',$banner->id)}}"
                                                   class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            @endcan
                                            @can('banners_delete')
                                                <form action="{{route('manage-banner.destroy',$banner->id)}}"
                                                      method="post"
                                                      style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            @endcan
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
