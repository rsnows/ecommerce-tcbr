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
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments("id");

            $table->integer("amount");
            $table->decimal("value", 10, 2);
            $table->datetime("item_date");
            $table->integer("product_id")->unsigned();
            $table->integer("order_id")->unsigned();
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
