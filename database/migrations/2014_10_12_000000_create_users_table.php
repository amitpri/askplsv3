<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_code')->unique();
            $table->integer('tenant')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable(); 
            $table->string('phone2')->nullable(); 
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('address_line_1')->nullable(); 
            $table->string('address_line_2')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('state')->nullable(); 
            $table->string('postal_code')->nullable(); 
            $table->string('country')->nullable(); 
            $table->text('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_o')->nullable(); 
            $table->string('companyname')->nullable();
            $table->string('designation')->nullable();
            $table->string('noofemp')->nullable();
            $table->string('companyaddress')->nullable();
            $table->string('companycity')->nullable();
            $table->string('companycountry')->nullable();
            $table->string('companyzip')->nullable();
            $table->string('companyphone1')->nullable();
            $table->string('companyphone2')->nullable();
            $table->string('companydomain')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
