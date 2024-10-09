<?php

namespace App\Models\Blog;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'name',
        'slug',
        'description',
        'image_id',
    ];

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');

    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
