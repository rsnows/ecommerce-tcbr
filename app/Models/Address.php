<?php

namespace App\Models;

class Address extends RModel
{
    protected $table = "addresses";
    protected $fillable = ['street', 'number', 'city', 'state', 'postcode'];

    public function setPostCodeAttribute($postcode)
    {
        $value = preg_replace("/[^0-9]/", "", $postcode);
        $this->attributes['postcode'] = $value;
    }

}
