<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'is_header',
        'is_footer',
        'is_home',
        'order',
        'image',
        'description',

    ];

    public function page()
    {
        return $this->hasMany(Page::class);

    }


    public function homePage($limit = 1)
    {
        return $this->hasMany(Page::class)->limit($limit)->get();

    }


}
