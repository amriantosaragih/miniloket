<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('customer_id', 36);
            $table->string('event_id', 36);
            $table->integer("quantity");
            $table->double('total_price');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('event_id')->references('id')->on('event');
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
        Schema::dropIfExists('transaction');
    }
}
