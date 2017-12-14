<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('equipment', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('asset_id'); // type of equipment
//            $table->integer('crew_id')->nullable(); // belongs to
//            $table->integer('user_id')->nullable();
//            $table->integer('miles')->nullable();
//            $table->integer('hours')->nullable();
//            $table->string('size')->nullable();
//            $table->string('label');
//            $table->string('serial')->nullable(); // serial
//            $table->integer('year')->nullable();
//            $table->string('make')->nullable();
//            $table->string('model')->nullable();
//            $table->string('location')->nullable();
//            $table->integer('active')->default(1);
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
        // Schema::dropIfExists('equipment');
    }
}
