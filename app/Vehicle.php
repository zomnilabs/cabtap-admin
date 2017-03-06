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
}
