<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        Factory(Client::class, 10)->create();
    }

}
