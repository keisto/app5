<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('phone');
          $table->string('email');
          $table->integer('active')->default(1);
          $table->timestamps();
        });

        Schema::create('client_contact', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('client_id');
          $table->integer('contact_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('client_contact');
    }
}
