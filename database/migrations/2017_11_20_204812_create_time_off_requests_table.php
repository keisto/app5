<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeOffRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_off_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamp('start')->nullable();
            $table->timestamp('stop')->nullable();
            $table->text('reason');
            // status
            // 1 = Pending | 2 = Approved | 3 = Canceled/Deleted
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
        Schema::dropIfExists('time_off_requests');
    }
}
