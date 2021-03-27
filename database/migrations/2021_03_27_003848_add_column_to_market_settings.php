<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMarketSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_settings', function (Blueprint $table) {
            $table->integer('add_all_price')->default(0);
            $table->integer('shipping')->default(0);
            $table->integer('fees')->default(0);
            $table->integer('dollar_to_krone')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_settings', function (Blueprint $table) {
            //
        });
    }
}
