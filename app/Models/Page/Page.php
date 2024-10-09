<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'title',
        'slug',
        'image',
        'excerpt',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'order',
        'youtube_url',

    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
