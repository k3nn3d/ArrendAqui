<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('user_1')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            //$table->unsignedBigInteger('user_2')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            //$table->unsignedBigInteger('id_casa')->references('id')->on('casas')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('conversas');
    }
}
