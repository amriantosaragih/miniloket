<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('name', 100);
            $table->string('ticket_type_id', 36);
            $table->string('location_id', 36);
            $table->string('schedule_id', 36);
            $table->foreign('ticket_type_id')->references('id')->on('ticket_type');
            $table->foreign('schedule_id')->references('id')->on('schedule');
            $table->foreign('location_id')->references('id')->on('location');
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
        Schema::dropIfExists('event');
    }
}
