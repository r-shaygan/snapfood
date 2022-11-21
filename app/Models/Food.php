<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];
    protected $table='foods';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function eatery(){
        return $this->belongsTo(Eatery::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
