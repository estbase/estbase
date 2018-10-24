<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'id' => '1',
            'title' => 'Counter-Strike: Global Offensive',
            'slug' => 'counter-strike-go',
            'short' => 'CS:GO',
            'icon' => 'csgo.png'
        ]);

        DB::table('games')->insert([
            'id' => '2',
            'title' => 'League of Legends',
            'slug' => 'league-of-legends',
            'short' => 'LoL',
            'icon' => 'lol.png'
        ]);

        DB::table('games')->insert([
            'id' => '3',
            'title' => 'Heroes of the Storm',
            'slug' => 'heroes-of-the-storm',
            'short' => 'HotS',
            'icon' => 'hots.png'
        ]);

        DB::table('games')->insert([
            'id' => '4',
            'title' => 'World of Warcraft',
            'slug' => 'world-of-warcraft',
            'short' => 'WoW',
            'icon' => 'wow.png'
        ]);
    }
}
