<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       //
        Schema::table('users', function (Blueprint $table) { 
        $table->unsignedBigInteger('id_convite')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
        
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    //
}
}
