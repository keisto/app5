<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor');
            $table->text('description');
            $table->integer('created_by'); // who created this request
            $table->integer('approved_by')->nullable(); // who approved this request
            $table->integer('user_id'); // po is for user (employee)
            $table->integer('asset_id')->nullable(); // nonbillable
            $table->text('bill_to')->nullable(); // billabe => client_id
            $table->string('other')->nullable(); // nonbillable
            $table->string('begin_date')->nullable(); // billable
            $table->string('end_date')->nullable(); // billable
            $table->integer('type');  // billable == 1 | nonbillable == 0
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
