<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleUser extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
