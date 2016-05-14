<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cardType', 20);
            $table->char('firstDigits', 4);
            $table->char('lastDigits', 4);
            $table->char('expirationMonth', 2);
            $table->char('expirationYear', 4);
            $table->string('image');
            $table->integer('shopper_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
