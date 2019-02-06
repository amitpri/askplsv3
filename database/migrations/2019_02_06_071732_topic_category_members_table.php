<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopicCategoryMembersTable extends Migration
{ 
    public function up()
    {
        Schema::create('topic_category_members', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('topicable_id')->unsigned()->nullable(); 
            $table->string('topicable_type')->nullable();
            $table->string('topic_name')->nullable();
            $table->string('type')->default('private');
            $table->integer('url')->unique();
            $table->text('details')->nullable(); 
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('sitedisplay')->default(true);
            $table->boolean('reviewdisplay')->default(true);
            $table->boolean('frontdisplay')->default(false);
            $table->boolean('status')->default(true);  
            $table->datetime('displayuptil')->nullable();   
            $table->integer('comments')->default(0);     
            $table->boolean('anonymous')->nullable()->default(false); 
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('topic_category_members');
    }
}
