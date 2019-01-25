<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fitnesscenterkey')->unique();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->integer('category_id')->default(4);
            $table->string('name')->nullable();
            $table->string('type')->nullable(); 
            $table->string('address')->nullable(); 
            $table->string('locality')->nullable();
            $table->string('city')->nullable();  
            $table->string('state')->nullable();
            $table->string('country')->nullable();  
            $table->string('website')->nullable(); 
            $table->string('links')->nullable(); 
            $table->string('details')->nullable();  
            $table->string('profilepic')->nullable(); 
            $table->string('video')->nullable();
            $table->boolean('status')->default(1);  
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
        Schema::dropIfExists('fitness_centers');
    }
}
