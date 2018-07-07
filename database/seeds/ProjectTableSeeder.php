<?php

use Illuminate\Database\Seeder;
use App\Entities\Project;

class ProjectTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project::truncate();
        Factory(Project::class, 10)->create();
    }

}
