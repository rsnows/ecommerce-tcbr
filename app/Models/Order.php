<?php

namespace App\Models;

class Order extends RModel
{
    protected $table = "orders";
    protected $dates = ['order_date'];
    protected $fillable = ['order_date', 'status', 'user_id'];

    public function statusDesc(){
        $desc = "";
        switch($this->status){
            case 'PEN': $desc = "PENDENTE"; break;
            case 'APR': $desc = "APROVADA"; break;
            case 'CAN': $desc = "CANCELADA"; break;
        }

        return $desc;
    }
}
