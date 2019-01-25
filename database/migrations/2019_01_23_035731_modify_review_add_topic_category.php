<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyReviewAddTopicCategory extends Migration
{ 
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {  
            $table->string('topic_categories_id')->nullable()->add(); 
        });
    } 

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('topic_categories_id'); 
        });
    }
}
