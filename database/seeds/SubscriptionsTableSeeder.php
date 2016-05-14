<?php

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'name'           => 'Bitdefender pro',
            'startDate'      => date("Y-m-d H:i:s"),
            'expirationDate' => date("Y-m-d H:i:s"),
            'image'          => 'http://url.com',
            'shopper_id'     => 1,
        ]);
    }
}
