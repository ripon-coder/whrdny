<?php

namespace App\Models;

use App\Observers\EventObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ["title", "slug", "start_date_time", "end_date_time", "image", "description", "location", "cost", "map_location", "category", "venu","time","upcoming"];

    public static function boot()
    {
        parent::boot();

        static::observe(EventObserver::class);
    }
}
