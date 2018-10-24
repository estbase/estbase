<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            InitialSeed::class,
            LanguagesSeed::class,
            CountriesSeed::class,
            GamesSeed::class,
            PlayersSeed::class
        ]);
    }
}
