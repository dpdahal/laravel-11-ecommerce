<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLevelForeign extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'level_id'
    ];
}
