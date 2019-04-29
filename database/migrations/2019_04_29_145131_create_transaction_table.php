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
            $table->string('id')->primary();
            $table->string('customer_id');
            $table->string('ticket_type_id');
            $table->string('event_id');
            $table->integer("quantity");
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_type')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
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
