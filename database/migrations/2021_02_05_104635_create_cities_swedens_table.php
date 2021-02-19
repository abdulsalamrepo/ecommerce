<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesSwedensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_swedens', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('lat');
            $table->string('lng');
            $table->string('country');
            $table->string('iso2');
            $table->string('admin_name');
            $table->string('capital');
            $table->string('population');
            $table->string('population_proper');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities_swedens');
    }
}
