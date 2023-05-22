<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function allowedCategories()
    {
        return $this->belongsToMany(CarCategory::class, 'category_limits', 'user_position_id', 'car_category_id');
    }
}
