<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTopicsAdminDisplay extends Migration
{
 
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) { 
            $table->boolean('frontdisplay')->default(true)->change();; 
        });
    }
 
    public function down()
    {
         
    }
}
