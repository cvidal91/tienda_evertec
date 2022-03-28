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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference','40');
            $table->string('customer_name', '80');
            $table->string('customer_email', '120');
            $table->string('customer_mobile', '40');
            $table->string('customer_description_order', '120');
            $table->float('customer_price_order', 12,2);
            $table->string('customer_request_id', '20');
            $table->text('customer_process_url');
            $table->enum('status', array('CREATED', 'PAYED', 'REJECTED'));
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
};
