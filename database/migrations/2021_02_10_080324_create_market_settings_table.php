<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            $table->string('address');
            $table->string('logo');
            $table->string('language');
            $table->string('currency');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('twitter');
            $table->string('google');
            $table->string('whatsapp');
            $table->string('instagram');

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
        Schema::dropIfExists('market_settings');
    }
}
