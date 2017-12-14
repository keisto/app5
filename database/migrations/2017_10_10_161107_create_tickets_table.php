<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dispatch_id')->nullable();
            $table->integer('task_id')->default(1);
            $table->string('location')->nullable();
            $table->string('work_order')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->string('contact_name')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('arrive')->nullable();
            $table->timestamp('depart')->nullable();
            $table->timestamp('stop')->nullable();
            /**
             * Type
             * 1 == billable ticket
             * 2 == drive ticket
             * 3 == nonbillable (shop) ticket
             */
            $table->integer('type')->default(1);
            /**
             * Status
             * 0 == Incomplete
             * 1 == completed -> awaiting approval
             * 2 == approved/verified -> awaiting invoice
             * 3 == invoiced -> now keep for records
             * 5 == deleted/canceled
             */
            $table->integer('status')->default(0);
            $table->timestamps();


        });

        Schema::create('charge_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('charge_id');
            $table->integer('ticket_id');
        });

        DB::update("ALTER TABLE tickets AUTO_INCREMENT = 50000;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge_ticket');
        Schema::dropIfExists('tickets');
    }
}
