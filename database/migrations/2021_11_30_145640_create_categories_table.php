<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
        $data = [
            ['name'=>'book', 'slug'=> 'books'],
            ['name'=>'movie', 'slug'=> 'movies'],
            ['name'=>'tv show', 'slug'=> 'tvshows'],
            ['name'=>'video game', 'slug'=> 'videogames'],
            ['name'=>'podcast', 'slug'=>'podcasts']
        ];
        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
