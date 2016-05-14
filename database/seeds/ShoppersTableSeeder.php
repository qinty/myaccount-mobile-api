<?php

use Illuminate\Database\Seeder;

class ShoppersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoppers')->insert([
            'firstName' => 'George',
            'lastName' => 'Simion',
            'email' => 'george.simion@avangate.com',
            'address' => 'Str. Foisorului, nr 8',
            'city' => 'Bucharest',
            'country_id' => 180,
            'state' => 'Bucharest',
            'phone' => '0724321828'
        ]);

        DB::table('shoppers')->insert([
            'firstName' => str_random(10),
            'lastName' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'address' => str_random(50),
            'city' => str_random(10),
            'country_id' => random_int(1, 243),
            'state' => str_random(10),
            'phone' => random_int(7000000000, 8000000000)
        ]);
    }
}
