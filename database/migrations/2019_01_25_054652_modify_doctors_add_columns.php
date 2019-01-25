<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDoctorsAddColumns extends Migration
{
 
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {  
            $table->string('qualification')->nullable()->add(); 
            $table->integer('exp')->nullable()->add();
        });
    }

 
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('qualification'); 
            $table->dropColumn('exp'); 
        });
    }
}
