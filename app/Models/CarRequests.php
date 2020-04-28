<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CarRequests extends Model
{
    //
    protected $fillable = [
        'car_owner_id',
        'car_id',
        'user_id',
        'name',
        'email',
        'phone',
        'pickup_location',
        'order_status',
        'total_distance',
        'total_price',
        'status',
    ];


    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car_owner()
    {
        return $this->belongsTo(User::class, 'car_owner_id', 'id');
    }
}
