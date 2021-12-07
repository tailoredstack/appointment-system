<?php

use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->integer('admin_users_id')->unsigned();
            $table->foreign('admin_users_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->timestamps();
        });

        Patient::create([
            'admin_users_id' => 2,
            'email' => 'johnnysince@email.com',
            'first_name' => 'Since',
            'last_name' => 'Since',
            'phone_no' => env('DEFAULT_PATIENT_PHONE_NO', '+639279588529'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
