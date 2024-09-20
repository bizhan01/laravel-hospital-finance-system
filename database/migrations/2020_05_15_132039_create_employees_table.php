<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('position');
            $table->string('salary');
            $table->string('dob');
            $table->string('phone');
            $table->string('email');
            $table->string('province1');
            $table->string('district1');
            $table->string('region1');
            $table->string('province2');
            $table->string('district2');
            $table->string('region2');
            $table->string('profileImage');
            $table->string('tazkira');
            $table->string('warranty');
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
        Schema::dropIfExists('employees');
    }
}
