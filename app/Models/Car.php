<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'driver_id', 'car_category_id'];

    /**
     * Retrieves the associated Driver model for this instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The Driver relationship.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * Returns the related CarCategory for this car.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carCategory()
    {
        return $this->belongsTo(CarCategory::class);
    }
    
    /**
     * Get the scheduled drives associated with the current object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scheduledDrives()
    {
        return $this->hasMany(ScheduledDrive::class);
    }
}
