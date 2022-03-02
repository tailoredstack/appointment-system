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
            'first_name' => env('DEFAULT_USER_SECRETARY_FIRST_NAME'),
            'last_name' => env('DEFAULT_USER_SECRETARY_LAST_NAME'),
            'email' => env('DEFAULT_USER_SECRETARY_EMAIL'),
            'phone_no' => env('DEFAULT_USER_SECRETARY_PHONE_NO'),
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
