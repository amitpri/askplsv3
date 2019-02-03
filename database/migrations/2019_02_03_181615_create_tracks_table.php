<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{

    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->string('user_name')->nullable(); 
            $table->string('user_email')->nullable(); 
            $table->string('ipaddress')->nullable(); 
            $table->string('page')->nullable(); 
            $table->string('url')->nullable();
            $table->string('type')->nullable();  
            $table->string('referrer')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
