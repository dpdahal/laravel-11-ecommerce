@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-2 mb-2 p-3">
                            <div class="pull-left">
                                <h2>Activity Details</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href=""> Back</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <th>Subject</th>
                                        <th>URL</th>
                                        <th>Method</th>
                                        <th>Ip</th>
                                        <th>Agent</th>
                                        <th>Created At</th>
                                    </tr>
                                    @foreach($activityData as $activity)
                                        <tr>
                                            <td>{{$activity->id}}</td>
                                            <td>{{$activity->subject}}</td>
                                            <td>{{$activity->url}}</td>
                                            <td>{{$activity->method}}</td>
                                            <td>{{$activity->ip}}</td>
                                            <td>{{$activity->agent}}</td>
                                            <td>{{$activity->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')

@endsection

