<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'display_label',
        'price_from',
        'description',
        'highlight_tag',
        'status',
        'sort_order',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
