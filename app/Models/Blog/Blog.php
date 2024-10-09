<?php

namespace App\Models\Blog;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_published',
        'title',
        'slug',
        'excerpt',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_commentable',
    ];

    public function postCategory()
    {
        return $this->belongsToMany(
            BlogCategory::class,
            BlogCategoryForeignTable::class,
            'blog_id',
            'category_id',
            'id')
            ->withTimestamps();
    }


    public function comments()
    {
        return $this->hasMany(BlogComments::class,
            'blog_id')->whereNull('parent_id');
    }

    public function totalComments()
    {
        return $this->hasMany(BlogComments::class,
            'blog_id', 'id')->count();
    }


    public function getPostInnerPage()
    {
        return $this->hasMany(BlogPage::class, 'blog_id', 'id');
    }

    public function totalChildPage()
    {
        return $this->hasMany(BlogPage::class, 'blog_id', 'id')->count();
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
