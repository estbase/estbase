<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'id' => \Illuminate\Support\Str::orderedUuid(),
            'email' => 'onavascuez@gmail.com',
            'name' => 'oriol',
            'nickName' => 'Anthrax',
            'nickNameHash' => '0',
            'discord' => 'Oriol#0558'
        ]);
    }
}
