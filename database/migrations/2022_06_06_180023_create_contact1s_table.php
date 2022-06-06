<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact1s', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name'); 
            $table->string('email');
        //     $table->string('name1');
        // $table->string('path'); 
            
            $table->string('phone_number')->nullable(); 
            $table->string('subject')->nullable();
            $table->text('message'); 
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
        Schema::dropIfExists('contact1s');
    }
};
