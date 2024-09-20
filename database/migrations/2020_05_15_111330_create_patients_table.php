<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('patientName')->nullable();
            $table->string('OPD')->nullable();
            $table->string('docName')->nullable();
            $table->integer('fee')->nullable();
            $table->integer('perscription')->nullable();
            $table->integer('retail')->nullable();
            $table->integer('emergency')->nullable();
            $table->integer('lab')->nullable();
            $table->integer('xray')->nullable();
            $table->integer('US')->nullable();
            $table->integer('dental')->nullable();
            $table->integer('physicalTherapy')->nullable();
            $table->integer('echo')->nullable();
            $table->integer('doblar')->nullable();
            $table->integer('pft')->nullable();
            $table->integer('endoscopy')->nullable();
            $table->integer('ambulance')->nullable();
            $table->integer('bed')->nullable();
            $table->integer('other')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
