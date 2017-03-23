<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//
        User::insert([
            'role_id' =>1,
            'active' =>1,
            'name'      => 'bernard',
            'username'  => 'mukama',
            'email'     =>'paulmukama@gmail.com',
            'password'  => bcrypt('password'),
            'remember_token'=> str_random(10)

        ]);
    }
}
