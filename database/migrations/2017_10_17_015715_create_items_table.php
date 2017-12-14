<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Employee == 1
        // Truck == 2
        // Trailer == 3
        // Equipment == 4
        // Tool == 5
        // Safety == 6
        // Purchase Order == 7
        // Other == 8
        //
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->nullable();
            $table->integer('category_id');
            $table->integer('ref_id')->nullable();
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('items');
    }
}
