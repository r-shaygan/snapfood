<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];

    public function eatery()
    {
        return $this->belongsTo(Eatery::class);
    }
}
