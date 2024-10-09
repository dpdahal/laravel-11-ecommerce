<?php

namespace App\Models\Job;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'name',
        'slug',
        'description',
        'image',
        'icon',
    ];

    public function parent()
    {
        return $this->belongsTo(JobCategory::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(JobCategory::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(JobCategory::class, 'parent_id', 'id');

    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
