<?php

namespace App\Repositories\Job;

use App\Models\Job\Education;
use App\Models\Job\Experience;
use App\Models\Job\JobCategory;

use App\Models\Job\JobLevel;
use App\Models\Job\JobPage;
use App\Models\Job\JobType;
use App\Models\Job\Skills;
use App\Models\User\Employer;
use App\Traits\General;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class JobRepository implements JobInterface
{
    use General;

    protected $model;

    public function __construct(JobPage $model)
    {
        $this->model = $model;
    }


    public function all()
    {
        $authUser = auth()->user();
        if ($authUser->account_type->name == 'employer') {
            return $this->model->where('user_id', '=', $authUser->id)->get();
        } else {
            return $this->model->all();
        }

    }

    public function getCompany()
    {
        $authUser = auth()->user();
        if ($authUser->account_type->name == 'employer') {
            return Employer::where('user_id', $authUser->id)->get();
        } else {
            return Employer::all();
        }

    }

    private function updateFile($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);

    }

    public function storeJob(array $data)
    {
        $data['user_id'] = $data['company_id'] ?? auth()->user()->id;
        $data['slug'] = Str::slug($data['slug']);
        $obj = $this->model->create($data);
        if ($obj) {
            $tableName = $this->model->getTable();
            $lastId = $this->model->latest()->first()->id;
            $filePath = 'uploads/' . $tableName;
            $fileData['image'] = $this->customFileUpload($filePath);
            $this->updateFile($lastId, $fileData);
        }
        if ($data['company_id']) {
            $obj->jobCompanyInsertAndUpdate()->attach($data['company_id']);
        }
        if ($data['category_id']) {
            $obj->jobCategoryInsertAndUpdate()->attach($data['category_id']);
        }

        if ($data['type_id']) {
            $obj->jobTypeInsertAndUpdate()->attach($data['type_id']);
        }

        if ($data['level_id']) {
            $obj->jobLevelInsertAndUpdate()->attach($data['level_id']);
        }

        if (isset($data['skill_id'])) {
            $obj->jobSkills()->attach($data['skill_id']);
        }

        if ($data['education_id']) {
            $obj->jobEducationInsertAndUpdate()->attach($data['education_id']);
        }

        if ($data['experience_id']) {
            $obj->jobExperienceInsertAndUpdate()->attach($data['experience_id']);
        }

        return true;

    }

    public function update(array $data, $id)
    {
        $data['slug'] = Str::slug($data['slug']);
        $this->updateFile($id, $data);
        $obj = $this->model->findOrFail($id);
        if ($data['company_id']) {
            $obj->jobCompanyInsertAndUpdate()->sync($data['company_id']);
        }
        if ($data['category_id']) {
            $obj->jobCategoryInsertAndUpdate()->sync($data['category_id']);
        }

        if ($data['type_id']) {
            $obj->jobTypeInsertAndUpdate()->sync($data['type_id']);
        }

        if ($data['level_id']) {
            $obj->jobLevelInsertAndUpdate()->sync($data['level_id']);
        }

        if (isset($data['skill_id'])) {
            $obj->jobSkills()->sync($data['skill_id']);
        }

        if ($data['education_id']) {
            $obj->jobEducationInsertAndUpdate()->sync($data['education_id']);
        }

        if ($data['experience_id']) {
            $obj->jobExperienceInsertAndUpdate()->sync($data['experience_id']);
        }

        return true;
    }

    public function delete($id)
    {

        $http_s = "";

        if (Request::isSecure()) {
            $http_s .= 'https:';
        } else {
            $http_s .= 'http:';
        }

        $post = $this->model->findOrFail($id);
        $image = $post->excerpt;
        $array = explode('src="', $image);

        $imageUrls = [];
        foreach ($array as $item) {
            preg_match('/' . $http_s . '\/\/[^"\']+/', $item, $matches);
            if (!empty($matches[0])) {
                $imageUrls[] = $matches[0];
            }
        }

        foreach ($imageUrls as $item) {
            $imagePath = parse_url($item, PHP_URL_PATH);
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }


        $descriptionImage = $post->description;
        $arrayDescription = explode('src="', $descriptionImage);
        $imageUrlsDescription = [];
        foreach ($arrayDescription as $item) {
            preg_match('/' . $http_s . '\/\/[^"\']+/', $item, $matches);
            if (!empty($matches[0])) {
                $imageUrlsDescription[] = $matches[0];
            }
        }
        foreach ($imageUrlsDescription as $item) {
            $imagePath = parse_url($item, PHP_URL_PATH);
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        $realPath = $post->image;
        $filePath = public_path($realPath);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }


        if ($post->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getJobCategory()
    {
        return JobCategory::all();
    }


    public function getJobType()
    {
        return JobType::all();
    }

    public function getJobLevel()
    {
        return JobLevel::all();
    }

    public function getJobSkill()
    {
        return Skills::all();
    }

    public function getJobEducation()
    {
        return Education::all();
    }

    public function getExperience()
    {
        return Experience::all();
    }

    public function clearAttributeByCriteria($id, $tableName)
    {
        if ($tableName == 'companies') {
            $this->model->findOrFail($id)->jobCompanyInsertAndUpdate()->detach();
        }
        if ($tableName == 'job_categories') {
            $this->model->findOrFail($id)->jobCategoryInsertAndUpdate()->detach();
        }
        if ($tableName == 'job_types') {
            $this->model->findOrFail($id)->jobTypeInsertAndUpdate()->detach();
        }
        if ($tableName == 'job_levels') {
            $this->model->findOrFail($id)->jobLevelInsertAndUpdate()->detach();
        }

        if ($tableName == 'job_educations') {
            $this->model->findOrFail($id)->jobEducationInsertAndUpdate()->detach();
        }

        if ($tableName == 'skills') {
            $this->model->findOrFail($id)->jobSkillsInsertAndUpdate()->detach();
        }

        if ($tableName == 'experiences') {
            $this->model->findOrFail($id)->jobExperienceInsertAndUpdate()->detach();
        }

        return true;
    }
}
