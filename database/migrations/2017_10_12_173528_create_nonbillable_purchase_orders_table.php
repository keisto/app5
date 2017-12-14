<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNonbillablePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonbillable_purchase_orders', function (Blueprint $table) {
          $table->increments('id');
          $table->string('vendor');
          $table->text('description');
          $table->integer('created_by'); // who created this request
          $table->integer('approved_by')->nullable(); // who approved this request
          $table->integer('user_id'); // po is for user (employee)
          $table->integer('asset_id')->nullable();
          $table->string('other')->nullable();
          $table->decimal('cost', 13, 2)->nullable();
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
        DB::update("ALTER TABLE nonbillable_purchase_orders AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nonbillable_purchase_orders');
    }
}
