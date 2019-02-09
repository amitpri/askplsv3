<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCategoryAddTop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('colleges', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('restaurants', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('lawyers', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('schools', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('hotels', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('fitness_centers', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
        Schema::table('companies', function (Blueprint $table) {    
            $table->boolean('top')->nullable()->default(false)->add(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('colleges', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('lawyers', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('fitness_centers', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('top');   
        });
    }
}
