<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('status')->nullable()->default('pending');
            $table->text('remarks')->nullable();
            $table->integer('dentist_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->foreign('dentist_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade');
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
        Schema::dropIfExists('appointment');
    }
}
