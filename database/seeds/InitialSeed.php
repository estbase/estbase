<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'name' => 'project_name',
            'value' => 'EST Base',
            'description' => 'Short name of this project'
        ]);
    }
}
