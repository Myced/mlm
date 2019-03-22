<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('momo_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_code');
            $table->string('user_id');
            $table->string('amount')->nullable();
            $table->string('user_number')->nullable();
            $table->string('receiver_number')->nullable();
            $table->string('momo_email')->nullable();
            $table->string('status_code')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('processing_number')->nullable();
            $table->text('raw_response')->nullable();
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
        Schema::dropIfExists('momo_logs');
    }
}
