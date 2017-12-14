<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBillablePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billable_purchase_orders', function (Blueprint $table) {
          $table->increments('id');
          $table->string('vendor');
          $table->text('description');
          $table->integer('created_by'); // who created this request
          $table->integer('approved_by')->nullable(); // who approved this request
          $table->integer('user_id'); // po is for user (employee)
          $table->text('bill_to')->nullable(); // client_id
          $table->string('begin_date')->nullable();
          $table->string('end_date')->nullable();
          /**
           * Status:
           * 0 = void
           * 1 = pending/approval
           * 2 = open
           * 3 = closed
           * 4 = in quickbooks ? pending
           */
          $table->integer('status')->default(1);
          $table->timestamps();
        });
        
        DB::update("ALTER TABLE billable_purchase_orders AUTO_INCREMENT = 50000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billable_purchase_orders');
    }
}
