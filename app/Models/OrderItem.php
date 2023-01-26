<?php

namespace App\Models;

class OrderItem extends RModel
{
    protected $table = "order_items";
    protected $fillable = ['amount', 'value', 'item_date', 'product_id', 'order_id'];
}
