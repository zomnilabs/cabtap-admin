<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function driver()
    {
        return $this->belongsTo(VehicleUser::class, 'vehicle_user_id', 'id');
    }

    public function passenger()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
