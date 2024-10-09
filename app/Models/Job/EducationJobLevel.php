<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationJobLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_id',
        'job_id'
    ];
}
