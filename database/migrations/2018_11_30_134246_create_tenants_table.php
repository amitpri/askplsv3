<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('workspace')->nullable();
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('url')->nullable();
            $table->string('emailid')->nullable();
            $table->integer('code')->unsigned();
            $table->boolean('status')->default(1); 
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
        Schema::dropIfExists('tenants');
    }
}
