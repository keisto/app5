<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('rates', function (Blueprint $table) {
//            $table->increments('id');
//            $table->decimal('rate', 13, 2);
//            $table->integer('type');
//            $table->integer('category_id');
//            $table->integer('asset_id');
//            $table->integer('client_id');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('rates');
    }
}
