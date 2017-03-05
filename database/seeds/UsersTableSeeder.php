<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'user_group' => 'admin',
            'email'      => 'admin@cabtap.com',
            'password'   => bcrypt('password'),
            'api_token'  => str_random(60)
        ]);

        $user->profle()->create([
            'first_name'    => 'admin',
            'last_name'     => 'admin',
            'gender'        => 'male',
        ]);

        $user = User::create([
            'user_group' => 'staff',
            'email'      => 'staff@cabtap.com',
            'password'   => bcrypt('password'),
            'api_token'  => str_random(60)
        ]);

        $user->profle()->create([
            'first_name'    => 'staff',
            'last_name'     => 'staff',
            'gender'        => 'male',
        ]);

        $user = User::create([
            'user_group' => 'driver',
            'email'      => 'driver1@cabtap.com',
            'password'   => bcrypt('password'),
            'api_token'  => str_random(60)
        ]);

        $user->profle()->create([
            'first_name'    => 'mark',
            'last_name'     => 'lopez',
            'gender'        => 'male',
        ]);
    }
}
