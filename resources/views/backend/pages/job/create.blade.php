@extends('backend.master.main')
@section('content')

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h2>
                                <i class="bi bi-newspaper"></i> Create Job
                                <a href="{{route('manage-job.index')}}" class="float-end btn btn-primary btn-sm">Show
                                    Jobs</a>
                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('manage-job.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <label for="company_id"
                                                   class="form-label">Company</label>
                                            <select class="form-select" name="company_id" id="company_id">
                                                <option value="">Select Company</option>
                                                @foreach($companyData as $company)
                                                    <option
                                                        value="{{$company->id}}">{{$company->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="category_id"
                                                   class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                <option value="">Select Category</option>
                                                @foreach($jobCategory as $category)
                                                    <option
                                                        value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                           name="start_date"
                                                           value="{{old('start_date')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" id="end_date"
                                                           name="end_date"
                                                           value="{{old('end_date')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="title">Title
                                                <span class="text-danger">
                                                                {{$errors->has('title') ? $errors->first('title') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="title"
                                                   name="title"
                                                   value="{{old('title')}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="slug">Slug
                                                <span class="text-danger">
                                                                {{$errors->has('slug') ? $errors->first('slug') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="slug"
                                                   name="slug"
                                                   value="{{old('slug')}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="summary">Excerpt</label>
                                            <textarea name="excerpt" id="summary"
                                                      class="form-control">{{old('excerpt')}}</textarea>
                                        </div>


                                        <div class="form-group mb-2">
                                            <label for="description">Description
                                                <span class="text-danger">
                                                                {{$errors->has('description') ? $errors->first('description') : ''}}
                                                            </span>
                                            </label>
                                            <textarea class="form-control" id="description"
                                                      name="description">
                                                            {{old('description')}}
                                                        </textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-4">


                                        <div class="form-group mb-2">
                                            <label for="experience_id"
                                                   class="form-label">Experience</label>
                                            <select class="form-select" name="experience_id" id="experience_id">
                                                <option value="">Select Experience</option>
                                                @foreach($experienceData as $exp)
                                                    <option
                                                        value="{{$exp->id}}">{{$exp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="type_id"
                                                   class="form-label">Job Type</label>
                                            <select class="form-select" name="type_id" id="type_id">
                                                <option value="">Select Level</option>
                                                @foreach($jobType as $level)
                                                    <option
                                                        value="{{$level->id}}">{{$level->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="level_id"
                                                   class="form-label">Job Level</label>
                                            <select class="form-select" name="level_id" id="level_id">
                                                <option value="">Select Level</option>
                                                @foreach($jobLevel as $level)
                                                    <option
                                                        value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="education_id"
                                                   class="form-label">Education Level</label>
                                            <select class="form-select" name="education_id" id="education_id">
                                                <option value="">Select Level</option>
                                                @foreach($jobEducation as $level)
                                                    <option
                                                        value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="location">Location
                                                <span class="text-danger">
                                                                {{$errors->has('location') ? $errors->first('location') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="location"
                                                   name="location"
                                                   value="{{old('location')}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="number_of_openings">Number of openings
                                                <span class="text-danger">
                                                                {{$errors->has('number_of_openings') ? $errors->first('number_of_openings') : ''}}
                                                            </span>
                                            </label>
                                            <input type="number" class="form-control" id="number_of_openings"
                                                   name="number_of_openings"
                                                   value="{{old('number_of_openings')}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="salary">salary
                                                <span class="text-danger">
                                                                {{$errors->has('salary') ? $errors->first('salary') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="salary"
                                                   name="salary"
                                                   value="{{old('salary')}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="is_featured"
                                                   class="form-label">Is featured</label>
                                            <select class="form-select" name="is_featured" id="is_featured">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="image">image
                                                <span class="text-danger">
                                                                {{$errors->has('image') ? $errors->first('image') : ''}}
                                                            </span>
                                            </label>
                                            <input type="file" class="form-control" id="image"
                                                   name="image"
                                                   value="{{old('image')}}">
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="meta_title">Meta Title:</label>
                                            <input type="text" id="meta_title" name="meta_title"
                                                   class="form-control"
                                                   value="{{old('meta_title')}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Meta Description:</label>
                                            <textarea name="meta_description" id="meta_description"
                                                      class="form-control">{{old('meta_description')}}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="meta_keywords"> Meta Keywords</label>
                                            <div class="tag-input-container">
                                                <input type="text" class="form-control"
                                                       name="meta_keywords"
                                                       value="{{old('meta_keywords')}}"
                                                       id="meta_keywords">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="skill_id">Job Skill</label>
                                            <select class="form-select" name="skill_id[]" id="skill_id"
                                                    data-placeholder="Select Job Skill" multiple>
                                                <option value="">Select Skill</option>
                                                @foreach($jobSkill as $skill)
                                                    <option value="{{$skill->id}}">
                                                        {{$skill->name}}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100"> Create Job</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $('#skill_id').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });

            CKEDITOR.replace('summary', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });


        });
    </script>

@endsection
