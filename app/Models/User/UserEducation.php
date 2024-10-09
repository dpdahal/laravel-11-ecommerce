<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'education_id',
        'start_date',
        'end_date',
        'college_name',
        'status',
    ];
}
