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

    public function filteredFoods($category_id)
    {
        return Food::where('eatery_id',$this->id)
            ->where('category_id',$category_id)->get();
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

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopeFilter($query,array $filter)
    {
        $currentTime=date('H:i');
        $currentDate=date('D');
        if (key_exists('type',$filter))
            $query->where('type', $filter['type']);
        if(key_exists('is_open',$filter))
             $query->join('work_times','eateries.id','=','eatery_id')->where('day','like',$currentDate)
                 ->select('eateries.*')
                 ->where('open','<',$currentTime)
                 ->where('close','>',$currentTime);
        return $query;
    }
}
