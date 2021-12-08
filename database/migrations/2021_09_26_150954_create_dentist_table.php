<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Dentist;

class CreateDentistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique()->nullable();
            $table->integer('admin_users_id')->unsigned();
            $table->foreign('admin_users_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->timestamps();
        });

        Dentist::create([
            'admin_users_id' => 4,
            'email' => 'jamesdoe@email.com',
            'first_name' => 'James',
            'last_name' => 'Doe',
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
        Schema::dropIfExists('dentist');
    }
}
