<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'id' => '1',
            'title' => 'English',
            'code' => 'en'
        ]);

        DB::table('languages')->insert([
            'id' => '2',
            'title' => 'Spanish',
            'code' => 'es'
        ]);
    }
}
