<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = [
            'VISA',
            'MASTERCARD',
            'AMEX'
        ];

        DB::table('cards')->insert([
            'cardType' => $cards[random_int(0,2)],
            'firstDigits' => random_int(1000, 9999),
            'lastDigits' => random_int(1000, 9999),
            'expirationMonth' => sprintf("%02d", random_int(1, 12)),
            'expirationYear' => random_int(2017, 2020),
            'shopper_id' => 1
        ]);
    }
}
