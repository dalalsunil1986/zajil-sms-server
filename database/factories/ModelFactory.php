<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Src\Models\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'api_token' => $faker->word,
        'remember_token' => str_random(10),
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\Message::class, function (Faker\Generator $faker) {
    return [
        'location' => $faker->name,
        'price' => '100.00',
        'recepient_count' => '2000',
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\Buffet::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(5),
        'location' => $faker->word,
        'address' => $faker->address,
    ];
});

$factory->define(\App\Src\Models\BuffetPackage::class, function (Faker\Generator $faker) {
    return [
        'buffet_id' => App\Src\Models\Buffet::orderByRaw("RAND()")->first()->id,
        'description' => $faker->sentence(5),
        'price' => '20.00',
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\Hall::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(5),
        'address' => $faker->address,
        'price' => '20.00',
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\Photographer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => '20.00',
        'description' => $faker->sentence(5),
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\GuestService::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => '20.00',
        'description' => $faker->sentence(5),
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\LightService::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => '20.00',
        'description' => $faker->sentence(5),
        'active' => 1
    ];
});

$factory->define(\App\Src\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'name'=>$faker->name,
        'transaction_id'=> uniqid(),
        'email'=>$faker->safeEmail,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
        'message_id'=>App\Src\Models\Message::orderByRaw("RAND()")->first()->id,
        'message_text'=>$faker->sentence(2),
        'buffet_package_id'=>App\Src\Models\BuffetPackage::orderByRaw("RAND()")->first()->id,
        'hall_id'=>App\Src\Models\Hall::orderByRaw("RAND()")->first()->id,
        'photographer_id'=>App\Src\Models\Photographer::orderByRaw("RAND()")->first()->id,
        'guest_service_id'=>App\Src\Models\GuestService::orderByRaw("RAND()")->first()->id,
        'light_service_id'=>App\Src\Models\LightService::orderByRaw("RAND()")->first()->id,
        'message_date'=>$faker->dateTime,
        'buffet_date'=>$faker->dateTime,
        'hall_date'=>$faker->dateTime,
        'photographer_date'=>$faker->dateTime,
        'light_service_date'=>$faker->dateTime,
        'guest_service_date'=>$faker->dateTime,
        'amount'=>$faker->randomDigit
    ];
});