<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eatery extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function eateryType()
    {
        return $this->belongsTo(EateryType::class, 'type', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'foods');
    }

    public function scopeFilterType($query, $type_id)
    {
        return $query->where('type', $type_id);
    }

    public function scopeFilterIsOpen($query)
    {
        $currentTime=date('H:i');
        return $query->where('opening_time','<',$currentTime)->where('closing_time','>',$currentTime);
    }
}
