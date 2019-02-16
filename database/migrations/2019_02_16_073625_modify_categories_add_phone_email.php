<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCategoriesAddPhoneEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('doctors', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('doctors', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('doctors', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('colleges', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('colleges', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('colleges', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('colleges', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('restaurants', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('restaurants', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('restaurants', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('restaurants', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('lawyers', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('lawyers', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('lawyers', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('lawyers', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('schools', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('schools', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('schools', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('schools', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('hotels', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('hotels', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('hotels', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('hotels', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('fitness_centers', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('fitness_centers', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('fitness_centers', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('fitness_centers', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
        });

        Schema::table('companies', function (Blueprint $table) {    
            $table->string('phone1')->nullable()->add(); 
        });
        Schema::table('companies', function (Blueprint $table) {    
            $table->string('phone2')->nullable()->add(); 
        });
        Schema::table('companies', function (Blueprint $table) {    
            $table->string('email1')->nullable()->add(); 
        });
        Schema::table('companies', function (Blueprint $table) {    
            $table->string('email2')->nullable()->add(); 
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
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');   
        });
        Schema::table('colleges', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');   
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
        Schema::table('lawyers', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
        Schema::table('fitness_centers', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('phone1');   
            $table->dropColumn('phone2');   
            $table->dropColumn('email1');   
            $table->dropColumn('email2');    
        });
    }
}
