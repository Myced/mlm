<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('user_id'); //this is the id of the benefitiary
            $table->string('level');
            $table->string('percentage');
            $table->string('order_value');
            $table->string('commission');
            $table->boolean('collected')->default(false);
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
        Schema::dropIfExists('order_commissions');
    }
}
