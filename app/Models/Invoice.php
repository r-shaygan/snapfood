<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'ordered_at'];
    public $timestamps = false;

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_invoice')->withPivot('count');
    }

    public function status()
    {
        return $this->belongsTo(InvoiceStatus::class, 'status_id');
    }

    public function eatery()
    {
        return $this->belongsTo(Eatery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(Address::class,'address','id');
    }

    protected static function booted()
    {
        static::addGlobalScope('order_by', function (Builder $builder) {
            $builder->orderBy('ordered_at','desc');
        });
    }

}
