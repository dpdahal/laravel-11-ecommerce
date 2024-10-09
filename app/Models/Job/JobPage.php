<?php

namespace App\Models\Job;

use App\Models\User\Employer;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'number_of_openings',
        'excerpt',
        'description',
        'salary',
        'location',
        'status',
        'start_date',
        'end_date',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
    ];

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobCategoryInsertAndUpdate()
    {
        return $this->belongsToMany(JobCategory::class, 'job_category_foreigns', 'job_id', 'category_id');
    }

    public function jobTypeInsertAndUpdate()
    {
        return $this->belongsToMany(JobType::class, 'job_type_foreigns', 'job_id', 'type_id');
    }

    public function jobLevelInsertAndUpdate()
    {
        return $this->belongsToMany(JobLevel::class, 'job_level_foreigns', 'job_id', 'level_id');
    }

    public function jobSkillsInsertAndUpdate()
    {
        return $this->belongsToMany(Skills::class, 'job_skills', 'job_id', 'skill_id');
    }

    public function jobEducationInsertAndUpdate()
    {
        return $this->belongsToMany(Education::class, 'education_job_levels', 'job_id', 'education_id');
    }

    public function jobCompanyInsertAndUpdate()
    {
        return $this->belongsToMany(Employer::class, 'companies', 'job_id', 'employer_id');
    }

    public function jobExperienceInsertAndUpdate()
    {
        return $this->belongsToMany(Experience::class, 'job_experiences', 'job_id', 'experience_id');
    }


    public function jobCategory()
    {
        return $this->hasOneThrough(JobCategory::class, JobCategoryForeign::class, 'job_id', 'id', 'id', 'category_id');
    }

    public function jobType()
    {
        return $this->hasOneThrough(JobType::class, JobTypeForeign::class, 'job_id', 'id', 'id', 'type_id');
    }

    public function jobLevel()
    {
        return $this->hasOneThrough(JobLevel::class, JobLevelForeign::class, 'job_id', 'id', 'id', 'level_id');
    }

    public function jobSkills()
    {
        return $this->belongsToMany(Skills::class, 'job_skills', 'job_id', 'skill_id');
    }

    public function jobEducation()
    {
        return $this->hasOneThrough(Education::class, EducationJobLevel::class, 'job_id', 'id', 'id', 'education_id');

    }


    public function jobCompany()
    {
        return $this->hasOneThrough(Employer::class, Company::class, 'job_id', 'id', 'id', 'employer_id');
    }

    public function jobExperience()
    {
        return $this->hasOneThrough(Experience::class, JobExperience::class, 'job_id', 'id', 'id', 'experience_id');
    }

}
