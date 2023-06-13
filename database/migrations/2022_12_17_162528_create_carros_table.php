<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('vc_path');
            $table->string('marca');
            $table->integer('estrelas')->nullable();
            $table->string('combustivel')->nullable();
            $table->string('estado')->default('pedente');
            $table->string('propriedade');
            $table->integer('lugares')->nullable();
            $table->integer('espaco')->nullable();
            $table->unsignedBigInteger('id_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('carros');
    }
}
