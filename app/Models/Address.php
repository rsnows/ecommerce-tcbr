<?php

namespace App\Models;

class Address extends RModel
{
    protected $table = "addresses";
    protected $fillable = ['street', 'number', 'city', 'state', 'postcode'];
}
