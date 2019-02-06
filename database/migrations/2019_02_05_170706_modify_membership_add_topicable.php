<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMembershipAddTopicable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {    
            $table->integer('topicable_id')->unsigned()->nullable()->add();
            $table->string('topicable_type')->nullable()->add(); 
        });
    }
 
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('topicable_id');   
            $table->dropColumn('topicable_type'); 
        });
    }
}
