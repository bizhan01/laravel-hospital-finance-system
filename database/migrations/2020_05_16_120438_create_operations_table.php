<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('patientName');
            $table->string('docName');
            $table->string('operationType');
            $table->integer('fee');
            $table->integer('docPercentage');
            $table->integer('assistantPercentage')->nullable();
            $table->integer('anesthesiaPercentage')->nullable();
            $table->integer('midwifePercentage')->nullable();
            $table->bigInteger('total');
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
        Schema::dropIfExists('operations');
    }
}
