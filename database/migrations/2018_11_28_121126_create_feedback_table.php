<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
 
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('topic_id')->unsigned()->nullable();
            $table->string('topic_name')->nullable();
            $table->integer('profile_id')->unsigned()->nullable();
            $table->text('feedback')->nullable();
            $table->boolean('status')->default(0); 
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
