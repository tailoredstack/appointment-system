<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'phone_no' => $faker->phoneNumber,
        'remember_token' => null,
        'updated_at' => $faker->dateTime,

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Patient::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Patient::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_no' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Secretary::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dentist::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dentist::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_no' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'description' => $faker->text(),
        'duration' => $faker->time(),
        'name' => $faker->firstName,
        'price' => $faker->randomFloat,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Secretary::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_no' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Schedule::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Schedule::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'date' => $faker->date(),
        'dentist_id' => $faker->randomNumber(5),
        'end' => $faker->time(),
        'start' => $faker->time(),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
