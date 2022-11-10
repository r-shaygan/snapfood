<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];

    public function eateryType()
    {
        return $this->belongsTo(EateryType::class,'eatery_type_id','id','eatery_types');
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
