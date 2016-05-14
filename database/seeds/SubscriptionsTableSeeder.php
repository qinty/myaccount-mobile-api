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
            'name'           => 'Bitdefender - Total security 2015',
            'description'    => 'Cea mai bună protecție. Cea mai bună performanță. Ușor de utilizat.',
            'startDate'      => date("Y-m-d H:i:s"),
            'expirationDate' => date("Y-m-d H:i:s"),
            'image'          => 'http://ec2-52-50-67-73.eu-west-1.compute.amazonaws.com/images/bitdefender.png',
            'shopper_id'     => 1,
        ]);

        DB::table('subscriptions')->insert([
            'name'           => 'Adobe Photoshop CC',
            'description'    => 'The world\'s most powerful creative imaging app gives you a complete set of professional tools to transform your images into anything you can imagine.',
            'startDate'      => date("Y-m-d H:i:s"),
            'expirationDate' => date("Y-m-d H:i:s"),
            'image'          => 'http://ec2-52-50-67-73.eu-west-1.compute.amazonaws.com/images/photoshop.jpg',
            'shopper_id'     => 1,
        ]);
    }
}
