<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategory extends Model
{
    protected $fillable = [
        'category_name',
        'slug',
        'short_description',
        'is_active',
    ];

    // Automatically create slug if empty
    protected static function booted()
    {
        static::saving(function ($category) {

            if (empty($category->slug)) {
                $category->slug = Str::slug($category->category_name);
            }
        });
    }
}
