<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopper extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
