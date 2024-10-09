<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTypeForeign extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'type_id'
    ];
}
