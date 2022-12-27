<?php

namespace App\Models;

class Address extends RModel
{
    protected $table = "categories";
    protected $fillable = ['street', 'number', 'city', 'state', 'postcode'];
}
