<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eatery extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];

    public function foods(){
        return $this->hasMany(Food::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class);
    }
}
