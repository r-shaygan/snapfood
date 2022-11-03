<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded=['created_at','updated_at'];

    protected $hidden = [
        'password'
    ];

    public function eatery(){
       return $this->hasOne(Eatery::class);
    }
}
