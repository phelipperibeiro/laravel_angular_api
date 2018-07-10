<?php

use Illuminate\Database\Seeder;
use App\Entities\ProjectNote;

class ProjectNoteTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ProjectNote::truncate();
        Factory(ProjectNote::class, 1000)->create();
    }

}
