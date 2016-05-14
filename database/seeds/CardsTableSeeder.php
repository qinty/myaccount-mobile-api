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

        DB::table('cards')->insert([
            'cardType'        => 'VISA',
            'firstDigits'     => random_int(1000, 9999),
            'lastDigits'      => random_int(1000, 9999),
            'expirationMonth' => sprintf("%02d", random_int(1, 12)),
            'expirationYear'  => random_int(2017, 2020),
            'image'           => 'http://ec2-52-50-67-73.eu-west-1.compute.amazonaws.com/images/visa.jpg',
            'shopper_id'      => 1,
        ]);

        DB::table('cards')->insert([
            'cardType'        => 'MASTERCARD',
            'firstDigits'     => random_int(1000, 9999),
            'lastDigits'      => random_int(1000, 9999),
            'expirationMonth' => sprintf("%02d", random_int(1, 12)),
            'expirationYear'  => random_int(2017, 2020),
            'image'           => 'http://ec2-52-50-67-73.eu-west-1.compute.amazonaws.com/images/mastercard.jpg',
            'shopper_id'      => 1,
        ]);
    }
}
