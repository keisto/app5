<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
          $table->increments('id'); // Job Number
          $table->integer('task_id')->default(1);
          $table->string('location')->nullable();
          $table->string('work_order')->nullable();
          $table->integer('user_id')->nullable();
          $table->integer('client_id')->nullable();
          $table->integer('contact_id')->nullable();
          $table->timestamp('start');
          $table->timestamp('stop')->nullable();
          /**
           * Status
           * 0 == Incomplete
           * 1 == completed
           * 2 == approved/verified
           * 3 == deleted/canceled
           */
          $table->integer('status')->default(0);
          $table->timestamps();
        });

        // Schema::create('dispatch_item', function (Blueprint $table) {
        //   $table->increments('id');
        //   $table->integer('dispatch_id');
        //   $table->integer('item_id');
        // });
        //
        // Schema::create('client_dispatch', function (Blueprint $table) {
        //   $table->increments('id');
        //   $table->integer('client_id');
        //   $table->integer('dispatch_id');
        // });
        //
        Schema::create('dispatch_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('dispatch_id');
          $table->integer('user_id');
        });

        Schema::create('dispatch_po', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('billable_purchase_order_id');
          $table->integer('dispatch_id');
        });

        Schema::create('dispatch_item', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('dispatch_id');
          $table->integer('item_id');
        });

        Schema::create('dispatch_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dispatch_id');
            $table->integer('ticket_id');
        });


        DB::update("ALTER TABLE dispatches AUTO_INCREMENT = 100000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
        Schema::dropIfExists('dispatch_user');
        Schema::dropIfExists('dispatch_po');
        Schema::dropIfExists('dispatch_item');
        Schema::dropIfExists('dispatch_ticket');
    }
}
