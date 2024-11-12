<?php

namespace App\Models;

use App\Observers\FundRaiseObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundRaise extends Model
{
    use HasFactory;
    protected $fillable = ["slug","title","raise","goal","image","details","end_date","status"];

    public function donation(){
        return $this->hasMany(Donation::class,'fund_id','id')->where('status','approve');
    }
    public static function boot()
    {
        parent::boot();

        static::observe(FundRaiseObserver::class);
    }
}
