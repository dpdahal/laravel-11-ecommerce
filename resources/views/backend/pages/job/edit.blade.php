<?php
$columnName = "image";
?>

@extends('backend.master.main')
@section('content')

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h2>
                                <i class="bi bi-pencil-square"></i> Update Job
                                <a href="{{route('manage-job.index')}}" class="float-end btn btn-primary btn-sm">Show
                                    Jobs</a>
                            </h2>
                        </div>
                        <div class="col-md-12">
                            @include('backend.layouts.message')
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('manage-job.update',$jobData->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="company_id"
                                                   class="form-label">Company</label>
                                            <select class="form-select" name="company_id" id="company_id">
                                                @if($jobData->jobCompany)
                                                    <option
                                                        value="{{$jobData->jobCompany->id}}">{{$jobData->jobCompany->company_name}}</option>
                                                @else
                                                    <option value="">Select Company</option>
                                                @endif

                                                @foreach($companyData as $company)
                                                    <option
                                                        value="{{$company->id}}">{{$company->company_name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'companies')}}">Clear</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="category_id"
                                                   class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                @if($jobData->jobCategory)
                                                    <option
                                                        value="{{$jobData->jobCategory->id}}">{{$jobData->jobCategory->name}}</option>
                                                @else
                                                    <option value="">Select Category</option>
                                                @endif

                                                @foreach($jobCategory as $category)
                                                    <option
                                                        value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'job_categories')}}">Clear</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="type_id"
                                                   class="form-label">Job Type</label>
                                            <select class="form-select" name="type_id" id="type_id">
                                                @if($jobData->jobType)
                                                    <option
                                                        value="{{$jobData->jobType->id}}">{{$jobData->jobType->type}}</option>
                                                @else
                                                    <option value="">Select Type</option>
                                                @endif

                                                @foreach($jobType as $type)
                                                    <option
                                                        value="{{$type->id}}">{{$type->type}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'job_types')}}">Clear</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="level_id"
                                                   class="form-label">Job Level</label>
                                            <select class="form-select" name="level_id" id="level_id">
                                                @if($jobData->jobLevel)
                                                    <option
                                                        value="{{$jobData->jobLevel->id}}">{{$jobData->jobLevel->name}}</option>
                                                @else
                                                    <option value="">Select Level</option>
                                                @endif

                                                @foreach($jobLevel as $level)
                                                    <option
                                                        value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'job_levels')}}">Clear</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="experience_id"
                                                   class="form-label">Experience</label>
                                            <select class="form-select" name="experience_id" id="experience_id">
                                                @if($jobData->jobExperience)
                                                    <option
                                                        value="{{$jobData->jobExperience->id}}">{{$jobData->jobExperience->name}}</option>
                                                @else
                                                    <option value="">Select Experience</option>
                                                @endif

                                                @foreach($experienceData as $exp)
                                                    <option
                                                        value="{{$exp->id}}">{{$exp->name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'experiences')}}">Clear</a>
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
                                                           value="{{$jobData->start_date}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" id="end_date"
                                                           name="end_date"
                                                           value="{{$jobData->end_date}}">
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
                                                   value="{{$jobData->title}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="slug">Slug
                                                <span class="text-danger">
                                                                {{$errors->has('slug') ? $errors->first('slug') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="slug"
                                                   name="slug"
                                                   value="{{$jobData->slug}}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="summary">Excerpt</label>
                                            <textarea name="excerpt" id="summary"
                                                      class="form-control">{{$jobData->excerpt}}</textarea>
                                        </div>


                                        <div class="form-group mb-2">
                                            <label for="description">Description
                                                <span class="text-danger">
                                                                {{$errors->has('description') ? $errors->first('description') : ''}}
                                                            </span>
                                            </label>
                                            <textarea class="form-control" id="description"
                                                      name="description">
                                                            {{$jobData->description}}
                                                        </textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="education_id"
                                                   class="form-label">Education Level</label>
                                            <select class="form-select" name="education_id" id="education_id">
                                                @if($jobData->jobEducation)
                                                    <option
                                                        value="{{$jobData->jobEducation->id}}">{{$jobData->jobEducation->name}}</option>
                                                @else
                                                    <option value="">Select Level</option>
                                                @endif

                                                @foreach($jobEducation as $level)
                                                    <option
                                                        value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'job_educations')}}">Clear</a>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="location">Location
                                                <span class="text-danger">
                                                                {{$errors->has('location') ? $errors->first('location') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="location"
                                                   name="location"
                                                   value="{{$jobData->location}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="number_of_openings">Number of openings
                                                <span class="text-danger">
                                                                {{$errors->has('number_of_openings') ? $errors->first('number_of_openings') : ''}}
                                                            </span>
                                            </label>
                                            <input type="number" class="form-control" id="number_of_openings"
                                                   name="number_of_openings"
                                                   value="{{$jobData->number_of_openings}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="salary">salary
                                                <span class="text-danger">
                                                                {{$errors->has('salary') ? $errors->first('salary') : ''}}
                                                            </span>
                                            </label>
                                            <input type="text" class="form-control" id="salary"
                                                   name="salary"
                                                   value="{{$jobData->salary}}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="is_featured"
                                                   class="form-label">Is featured</label>
                                            <select class="form-select" name="is_featured" id="is_featured">
                                                <option value="1" {{$jobData->is_featured == 1 ? 'selected' : ''}}>Yes
                                                </option>
                                                <option value="0" {{$jobData->is_featured == 0 ? 'selected' : ''}}>No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="form-group">
                                                @include('backend.layouts.update-image',['tableName'=>$jobData->getTable(),'id'=>$jobData->id])
                                            </div>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="meta_title">Meta Title:</label>
                                            <input type="text" id="meta_title" name="meta_title"
                                                   class="form-control"
                                                   value="{{$jobData->meta_title}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Meta Description:</label>
                                            <textarea name="meta_description" id="meta_description"
                                                      class="form-control">{{$jobData->meta_description}}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="meta_keywords"> Meta Keywords</label>
                                            <div class="tag-input-container">
                                                <input type="text" class="form-control"
                                                       name="meta_keywords"
                                                       value="{{$jobData->meta_keywords}}"
                                                       id="meta_keywords">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="skill_id">Job Skill</label>
                                            <select class="form-select" name="skill_id[]" id="skill_id" multiple>
                                                @if($jobData->jobSkills)
                                                    @foreach($jobData->jobSkills as $js)
                                                        <option value="{{$js->id}}" selected>{{$js->name}}</option>
                                                    @endforeach
                                                @endif
                                                @foreach($jobSkill as $skill)
                                                    @if(!$jobData->jobSkills->contains($skill->id))
                                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <a href="{{route('manage-job-clear-attribute',$jobData->id.'/'.'job_skills')}}">Clear</a>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100"> Updates Job</button>
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
