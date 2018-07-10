<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        
        //        Factory(\App\Entities\User::class, 10)->create(['name' => 'Felipe Ribeiro',
        //            'email' => 'phelipperibeiro@hotmail.com',
        //            'password' => bcrypt(123456),
        //            'remember_token' => str_random(10)]);
        
        Factory(User::class, 10)->create();
    }

}
