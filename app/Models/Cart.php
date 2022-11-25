<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function foods()
    {
        return $this->belongsToMany(Food::class,'cart_food')->withPivot('count');
    }

    public function eatery()
    {
        return $this->belongsTo(Eatery::class);
    }

}
