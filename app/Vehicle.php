<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function drivers()
    {
        return $this->hasMany(VehicleUser::class);
    }

    public function maintenaces()
    {
        return $this->hasMany(VehicleMaintenance::class);
    }

    public function getVehicleAttribute()
    {
        return ucwords($this->attributes['make'] . ' ' . $this->attributes['model'] . ' ' . $this->attributes['year'] . ' : ' . $this->attributes['plate_number']);
    }
}
