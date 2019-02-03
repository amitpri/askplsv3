<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTopicsCategoryAddAnonymous extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_categories', function (Blueprint $table) {    
            $table->boolean('anonymous')->nullable()->default(false)->add(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_categories', function (Blueprint $table) {
            $table->dropColumn('anonymous');   
        });
    }
}
