<?php

namespace App\Models;

use App\Enums\Admin\SliderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'description',
        'button_url',
        'status',
    ];
    protected $casts = [
        'status' => SliderEnum::class,
    ];
}
