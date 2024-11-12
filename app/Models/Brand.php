<?php

namespace App\Models;

use App\Enums\Admin\BrandEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'status',
    ];
    protected $casts = [
        'status' => BrandEnum::class,
    ];
}
