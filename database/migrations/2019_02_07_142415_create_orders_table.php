<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->string('order_id')->nullable(); 
            $table->string('transaction_id')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('price')->nullable();  
            $table->string('currency')->nullable();
            $table->string('plan')->nullable();
            $table->string('address_line_1')->nullable(); 
            $table->string('address_line_2')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('state')->nullable(); 
            $table->string('postal_code')->nullable(); 
            $table->string('country')->nullable();  
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
