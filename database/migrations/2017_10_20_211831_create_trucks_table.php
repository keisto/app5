<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('trucks', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('asset_id'); // type of truck
//            $table->integer('crew_id')->nullable();
//            $table->integer('user_id')->nullable();
//            $table->integer('miles')->nullable();
//            $table->integer('hours')->nullable();
//            $table->string('label');
//            $table->string('vin')->nullable(); // vin
//            $table->integer('year')->nullable();
//            $table->string('make')->nullable();
//            $table->string('model')->nullable();
//            $table->string('plate')->nullable();
//            $table->string('expire')->nullable();
//            $table->boolean('ifta')->default(false);
//            $table->string('location')->nullable();
//            $table->boolean('active')->default(true);
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
        // Schema::dropIfExists('trucks');
    }
}
