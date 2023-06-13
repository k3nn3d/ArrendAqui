<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAluguelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguels', function (Blueprint $table) {
            $table->id();
            $table->string('largada')->nullable();
            $table->string('chegada')->nullable();
            $table->date('data')->nullable();
            $table->string('estado')->default('Pendente');
            $table->string('pagamento')->nullable();
            $table->unsignedBigInteger('id_casa')->references('id')->on('casas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_carro')->references('id')->on('carros')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
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
        Schema::dropIfExists('aluguels');
    }
}
