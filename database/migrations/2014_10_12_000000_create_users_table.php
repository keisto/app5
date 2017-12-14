<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//          $table->increments('id');
//          $table->string('name');
//          $table->string('email')->unique();
//          $table->string('password');
//          $table->string('access')->default(1);
//          $table->string('phone')->nullable();
//          $table->string('birthday')->nullable();
//          $table->string('hired_on')->nullable();
//          $table->integer('has_license')->default(1); // yes / no
//          $table->string('license')->nullable();
//          $table->integer('has_cdl')->default(0); // yes / no
//          $table->string('cdl_expire')->nullable();
//          $table->integer('crew_id')->nullable();
//          $table->integer('active')->default(1); // active / inactive
//          // TODO relationship to certifications table
//          // TODO relationship to assets table
//          // TODO relationship to docks table
//          $table->rememberToken();
//          $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('users');
    }
}
