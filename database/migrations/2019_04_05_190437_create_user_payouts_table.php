<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('month');
            $table->string('year');
            $table->string('amount');
            $table->string('network')->nullable();
            $table->boolean('paid')->default(false);
            $table->boolean('moved')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->text('error_message')->nullable();
            $table->string('commissions')->nullable();
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
        Schema::dropIfExists('user_payouts');
    }
}
