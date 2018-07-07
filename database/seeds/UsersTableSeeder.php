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
        Factory(User::class, 10)->create();
    }

}
