<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneologyDepthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geneology_depths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depth')->default(5);
            $table->integer('width')->default('5');
            $table->integer('membership_levels')->default('6');
            $table->integer('points_level')->default('6');
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
        Schema::dropIfExists('geneology_depths');
    }
}
