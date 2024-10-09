@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-folder-fill"></i> Page List
                                <a href="{{route('manage-page.create')}}"
                                   class="btn btn-success btn-sm float-end">
                                    <i class="bi bi-plus-circle"></i> Add Page</a>

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
                                    <th>Page Type</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pageData as $key=>$page)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$page->title}}</td>
                                        <td>{{$page->menu->name}}</td>
                                        <td>
                                            @if($page->image)
                                                <img src="{{url($page->image)}}" alt="" style="width: 100px;">

                                            @endif
                                        </td>
                                        <td style="width: 12%;">
                                            <a href="{{route('manage-page.show',$page->id)}}"
                                               class="btn btn-info btn-sm" title="views">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{route('manage-page.edit',$page->id)}}"
                                               class="btn btn-primary btn-sm" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{route('manage-page.destroy',$page->id)}}" method="post"
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
