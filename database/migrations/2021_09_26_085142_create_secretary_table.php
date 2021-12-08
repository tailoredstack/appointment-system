<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Secretary;

class CreateSecretaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->integer('admin_users_id')->unsigned();
            $table->foreign('admin_users_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->timestamps();
        });

        Secretary::create([
            'admin_users_id' => 3,
            'email' => 'janedoe@email.com',
            'first_name' => 'Jane',
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
        Schema::dropIfExists('secretary');
    }
}
