<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('client');
          $table->string('short');
          $table->string('address');
          $table->string('city');
          $table->string('state');
          $table->string('zipcode');
          $table->string('phone')->nullable();
          $table->string('contract')->nullable();
          $table->integer('active')->default(1);
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
        Schema::dropIfExists('clients');
    }
}
