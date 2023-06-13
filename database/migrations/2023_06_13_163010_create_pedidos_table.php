<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_carro')->references('id')->on('carros')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_casa')->references('id')->on('casas')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->string('estado')->nullable();
            $table->float('preco');
            $table->string('data');
            $table->string('hora');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('pedidos');
    }
}
