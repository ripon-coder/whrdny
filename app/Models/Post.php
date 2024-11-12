<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'publish_date',
        'author',
        'image'
    ];

    public function comment() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
