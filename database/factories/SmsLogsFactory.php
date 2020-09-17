<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\SmsLog;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SmsLog::class, function (Faker $faker) {
    $directionArray = ['outbound', 'inbound'];
    $direction = $directionArray[rand(0, 1)];

    if ($direction == 'inbound'):
        $status = 'received'; else:
        $status = 'delivered';
    endif;

    $body = $faker->text(rand(160, 900));

    $segments = (int) ceil(strlen($body) / 160);
    $price = (float) (0.0075 * $segments);

    return [
        'sid' => Str::random(34),
        'from' => $faker->phoneNumber,
        'to' => $faker->phoneNumber,
        'body' => $faker->text,
        'direction' => $direction,
        'response' => null,
        'segments' => $segments,
        'status' => $status,
        'price' => $price * -1,
        'price_unit' => 'USD',
        'date_created' => now(),
        'date_updated' => now(),
        'date_sent' => now()->addSeconds(rand(0, 30)),
    ];
});
