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
            'firstName' => str_random(10),
            'lastName' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'address' => str_random(50),
            'city' => str_random(10),
            'country' => random_int(1, 247),
            'state' => str_random(10),
            'phone' => random_int(7000000000, 8000000000)
        ]);
    }
}
