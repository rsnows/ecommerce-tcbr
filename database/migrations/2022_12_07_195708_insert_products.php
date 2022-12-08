<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Category(['category_name' => 'General']);
        $cat->save();

        $prod1 = new \App\Models\Product(['name' => 'Produto 1', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod1->save();
        $prod2 = new \App\Models\Product(['name' => 'Produto 2', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod2->save();
        $prod3 = new \App\Models\Product(['name' => 'Produto 3', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod3->save();
        $prod4 = new \App\Models\Product(['name' => 'Produto 4', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod4->save();
        $prod5 = new \App\Models\Product(['name' => 'Produto 5', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod5->save();
        $prod6 = new \App\Models\Product(['name' => 'Produto 6', 'value' => 10, 'picture' => 'images/produto1.jpg', 'description' => '', 'category_id' => $cat->id]);
        $prod6->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
