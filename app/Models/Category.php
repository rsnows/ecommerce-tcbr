<?php

namespace App\Models;

class Category extends RModel
{
    protected $table = "categories";
    protected $fillable = ['id', 'category_name'];
}
