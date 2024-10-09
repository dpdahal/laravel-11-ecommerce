@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <h2>
                                <i class="bi bi-envelope"></i> Resume List
                            </h2>
                        </div>

                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Resume</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($resumeData as $resume)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $resume->name }}</td>
                                        <td>{{ $resume->email }}</td>
                                        <td>
                                            <a href="{{url($resume->resume)}}" target="_blank">View Resume</a>
                                        </td>
                                        <td>{{ $resume->message }}</td>
                                        <td>
                                            <a href="{{route('resume-delete', $resume->id)}}" class="btn btn-danger">Delete</a>
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


