<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cookie')->nullable();
            $table->boolean('referred')->default(false);
            $table->string('referrer_code')->nullable();
            $table->string('ref_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('region_id')->nullable();
            $table->text("address")->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('tel')->nullable();
            $table->string('dob')->nullable();
            $table->string('payout_network')->nullable();
            $table->string('payout_number')->nullable();
            $table->string('points')->default('0');
            $table->string('membership_level')->default('0');
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
        Schema::dropIfExists('user_datas');
    }
}
