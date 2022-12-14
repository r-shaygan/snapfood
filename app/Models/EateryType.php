<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EateryType extends Model
{
    use HasFactory;
    protected $table='eatery_types';
    protected $guarded=['created_at','updated_at'];

    public function categories()
    {
        $this->hasMany(Category::class,'eatery_type_id','id');
    }

    public function eateries()
    {
        $this->hasMany(Eatery::class,'type','id');
    }
}
