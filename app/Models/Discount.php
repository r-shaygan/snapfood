<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];

    public function eatery()
    {
        return $this->belongsTo(Eatery::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('expired', function (Builder $builder) {
            $builder->where('end', '>', date('Y:m:d H:i') );
        });
    }
}
