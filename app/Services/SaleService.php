<?php

namespace App\Services;

use Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use DateTime;

class SaleService{
    public function finishSale($prods = [], User $user){

        try {
            \DB::beginTransaction();

            $time = new DateTime();
            $order = new Order();
            $order->order_date = $time->format("Y-m-d H:i:s");
            $order->status = "PEN";
            $order->user_id = $user->id;
            $order->save();

            foreach($prods as $p){
                $item = new OrderItem();
                $item->amount = 1;
                $item->value = $p->value;
                $item->item_date = $time->format("Y-m-d H:i:s");
                $item->product_id = $p->id;
                $item->order_id = $order->id;
                $item->save();
            }
            \DB::commit();
            return ['status' => 'ok', 'message' => 'Venda finalizada com sucesso.'];
            
        } catch (\Exception $e) {
            Log::error("ERRO", ['message' => $e->getMessage()]);
            return ['status' => 'err', 'message' => 'A venda não pode ser finalizada.'];
        }

    }
}