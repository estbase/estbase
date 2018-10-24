<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('name');
            $table->string('value');
            $table->string('description');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('code', 3);

            $table->engine = 'InnoDB';
            $table->unique('title');
            $table->unique('code');
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('code', 3);
            $table->string('icon')->nullable();

            $table->engine = 'InnoDB';
            $table->unique('title');
            $table->unique('code');
        });

        //---------------------------------------------------

        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug', 120);
            $table->string('short',20)->nullable();
            $table->string('icon')->nullable();

            $table->engine = 'InnoDB';
            $table->unique('slug');
        });


        Schema::create('players', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedInteger('country_id')->default(1);
            $table->unsignedInteger('language_id')->default(1);

            // General info
            $table->string('email')->unique();
            $table->string('name', 100)->nullable();
            $table->string('surname', 100)->nullable();
            $table->string('nickName', 100);
            $table->string('nickNameHash', 12);
            $table->date('birthDate')->nullable();
            $table->integer('gender')->nullable()->default(0);
            $table->string('occupation')->nullable();
            $table->string('website')->nullable();
            $table->text('about')->nullable();

            // Social & gaming networks
            $table->string('twitch', 100)->nullable();
            $table->string('discord', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('steam_id', 100)->nullable();
            $table->string('epic_id', 100)->nullable();
            $table->string('riot_id', 100)->nullable();
            $table->string('blizzard_id', 100)->nullable();

            // Computer info
            $table->string('cpu')->nullable();
            $table->string('graphics')->nullable();
            $table->string('ram')->nullable();
            $table->string('motherboard')->nullable();
            $table->string('drives')->nullable();
            $table->string('display')->nullable();
            $table->string('mouse')->nullable();
            $table->string('keyboard')->nullable();
            $table->string('headset')->nullable();
            $table->string('mousepad')->nullable();

            // Favourites
            $table->string('drink')->nullable();
            $table->string('food')->nullable();
            $table->string('music')->nullable();
            $table->string('song')->nullable();
            $table->string('film')->nullable();
            $table->string('game')->nullable();

            // Tracking
            $table->string('access_counter')->nullable();
            $table->dateTime('last_access')->nullable();

            // Gamification
            $table->integer('karma')->unsigned()->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('language_id')->references('id')->on('languages');
        });


//        Schema::create('', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title', 100);
//            $table->timestamps();
//
//            $table->engine = 'InnoDB';
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET foreign_key_checks = 0');
        Schema::drop('configs');
        Schema::drop('languages');
        Schema::drop('countries');
        Schema::drop('games');
        Schema::drop('players');
        DB::statement('SET foreign_key_checks = 1');

        //        Schema::drop('');
    }
}
