<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('comments')->nullable();
            $table->string('shipping_address');
            $table->float('discount_amount',8,2);
            $table->string('status',20)->default('pending');
            $table->string('payment_type',20)->default('cash');
            $table->float('total',8,2);
            $table->float('charges',8,2)->nullable()->default(0);
            $table->float('subtotal',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
