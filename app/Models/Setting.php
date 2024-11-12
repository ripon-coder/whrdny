<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        "logo",
        "footer_logo",
        "fevicon",
        "email",
        "facebook",
        "twitter",
        "linkdin",
        "instragram",
        "youtube",
        "address_one_title",
        "address_one_mobile",
        "address_one_email",
        "address_one_address",
        "address_two_title",
        "address_two_mobile",
        "address_two_email",
        "address_two_address",
        "get_in_touch",
        "about_us"
    ];
}
