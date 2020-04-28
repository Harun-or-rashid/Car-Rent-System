<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
        'car_no',
        'car_name',
        'user_id',
        'category_id',
        'car_type_id',
        'num_of_sits',
        'price_per_km',
        'image',
        'car_details',
        'status',
        'created_at',
        'updated_at',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car_type()
    {
        return $this->belongsTo(CarType::class);
    }
}
