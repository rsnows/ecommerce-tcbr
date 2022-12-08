<?php

namespace App\Models;

class Product extends RModel
{
    protected $table = "products";
    protected $fillable = ['name', 'value', 'picture', 'description', 'category_id'];
}
