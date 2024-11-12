<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = ["fund_id","raise","status"];

    public function fund(){
        return $this->belongsTo(FoundRaise::class,"fund_id","id");
    }
}
