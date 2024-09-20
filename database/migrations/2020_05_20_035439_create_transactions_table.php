<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('transaction_date')->nullable();
            $table->decimal('buy_tot', 9, 2)->nullable();
            $table->string('buy_invice_no')->nullable();
            $table->decimal('pay_tot', 9, 2)->nullable();
            $table->string('pay_invice_no')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('description')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('transactions');
    }
}
