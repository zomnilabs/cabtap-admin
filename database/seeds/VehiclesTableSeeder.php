<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'make'  => 'Toyota',
            'model' => 'Vios',
            'year'  => '2016',
            'plate_number'  => 'AHA123'
        ]);

        Vehicle::create([
            'make'  => 'Toyota',
            'model' => 'Vios',
            'year'  => '2016',
            'plate_number'  => 'ABC345'
        ]);

        Vehicle::create([
            'make'  => 'Toyota',
            'model' => 'Vios',
            'year'  => '2016',
            'plate_number'  => 'DGH554'
        ]);
    }
}
