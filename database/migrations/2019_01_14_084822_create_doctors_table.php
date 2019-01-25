<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) { 
            $table->increments('id');
            $table->integer('doctorkey')->unique();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->integer('category_id')->default(3);
            $table->string('name')->nullable();
            $table->string('speciality')->nullable();
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
