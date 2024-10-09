@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h2>
                                <i class="bi bi-people-fill"></i> Menu List
                                <a href="{{route('manage-menu.create')}}" class="btn btn-success btn-sm float-end">Add
                                    Menu</a>

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
                                    <th>Menu Name</th>
                                    <th>Is Header</th>
                                    <th>Is Footer</th>
                                    <th>Is Home</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menuData as $key=>$menu)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->is_header == '1' ? 'Yes' : 'No'}}</td>
                                        <td>{{$menu->is_footer == '1' ? 'Yes' : 'No'}}</td>
                                        <td>{{$menu->is_home == '1' ? 'Yes' : 'No'}}</td>
                                        <td>
                                            @if($menu->image)
                                                <img src="{{asset('uploads/menu/'.$menu->image)}}" alt="image"
                                                     width="50">
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('manage-menu.destroy',$menu->id)}}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a href="{{route('manage-menu.edit',$menu->id)}}"
                                                   class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                    Delete
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
