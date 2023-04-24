<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vc_path');
            $table->string('rua');
            $table->string('link')->nullable();
            $table->integer('estrelas')->nullable();
            $table->text('descricao');
            $table->float('preco');
            $table->integer('quartos');
            $table->integer('cozinha');
            $table->integer('casa_de_banho');
            $table->integer('estado')->default(1);
            $table->integer('plano')->default(0);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
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
        Schema::dropIfExists('casas');
    }
}
