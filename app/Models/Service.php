<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_summary',
        'long_description',
        'starting_price',
        'show_on_website',
        'has_packages',
        'status',
        'sort_order',
        'image',
    ];

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    // Relationship with packages (later)
    public function packages()
    {
        return $this->hasMany(ServicePackage::class);
    }
}
