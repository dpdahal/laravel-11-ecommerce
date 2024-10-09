@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h2>
                                <i class="bi bi-newspaper"></i> Manage Job Type
                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post" onsubmit="addJobType(event)">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name">Name:
                                                <span id="nameError" style="color: red;"></span>
                                            </label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button id="btn_name" class="btn btn-success">
                                                <i class="bi bi-plus-circle"></i> Add Job Type
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h2>
                                <i class="bi bi-eye"></i> Show Section
                            </h2>

                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <div class="modal fade" id="update_section" tabindex="-1" aria-hidden="true"
                                 style="display: none;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="bi bi-pencil-square"></i> Update Job Type</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="criteria">
                                            <label for="update_section_name">Name:</label>
                                            <input type="text" class="form-control" id="update_section_name">
                                            <span id="updateNameError" style="color: red;"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" onclick="updateSection()" class="btn btn-primary">Save
                                                changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>

        function addJobType(e) {
            e.preventDefault();
            let name = document.getElementById('name').value;
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let sendData = {
                type: name
            }
            axios.post('{{route('manage-job-type.store')}}', sendData, {
                headers: {
                    'X-CSRF-TOKEN': token
                }

            }).then(function (response) {
                if (response.data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: response.data.success,
                        timer: 1500
                    })
                    document.querySelector('form').reset();
                    document.getElementById('nameError').innerText = '';
                }

                getAllData();
            })
                .catch(function (error) {
                    if (error.response.data.errors.type) {
                        document.getElementById('nameError').innerText = error.response.data.errors.type[0];
                    }
                    console.log(error);
                });


        }

        function getAllData() {
            axios.get('{{route('manage-job-type.all-job')}}')
                .then(function (response) {
                    let data = response.data;
                    let html = '';
                    data.forEach(function (item, index) {
                        html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.type}</td>
                           <td>${item.created_at}</td>
                            <td width="20%">
                                <button type="button" class="btn btn-primary btn-sm"  onclick="editSection(${item.id})" data-bs-toggle="modal" data-bs-target="#update_section">
                                <i class="fa fa-pencil-square"></i>
                            </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteSection(${item.id})"> <i class="bi bi-trash"></i></button>
                            </td>

                        `;
                    });
                    document.querySelector('tbody').innerHTML = html;

                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        getAllData();

        function deleteSection(id) {
            let sendData = {
                id: id
            }
            axios.post('{{route('manage-job-type.delete')}}', sendData)
                .then(function (response) {
                    if (response.data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: response.data.success,
                            timer: 3000
                        })
                        getAllData();
                    } else {
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: response.data.error,
                        })
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function editSection(id) {
            let sendData = {
                id: id
            }
            axios.post('{{route('manage-job-type.edit')}}', sendData)
                .then(function (response) {
                    let data = response.data;
                    document.getElementById('update_section_name').value = data.type;
                    document.getElementById('criteria').value = data.id;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function updateSection() {
            let name = document.getElementById('update_section_name').value;
            let id = document.getElementById('criteria').value;
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let sendData = {
                id: id,
                type: name
            }
            axios.post('{{route('manage-job-type.update')}}', sendData, {
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
                .then(function (response) {
                    if (response.data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: response.data.success,
                            timer: 3000
                        })
                        getAllData();
                        document.getElementById('updateNameError').innerText = '';
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: response.data.error,
                        })
                    }
                })
                .catch(function (error) {
                    if (error.response.data.errors.name) {
                        document.getElementById('updateNameError').innerText = error.response.data.errors.name[0];
                    }
                    console.log(error);
                });
        }


    </script>

@endsection


