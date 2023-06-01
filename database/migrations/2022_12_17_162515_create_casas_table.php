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
            $table->string('bairro');
            $table->string('vc_path');
            $table->string('rua');
            $table->string('planta')->nullable();
            $table->string('propriedade');
            $table->string('link')->nullable();
            $table->integer('estrelas')->nullable();
            $table->text('descricao')->nullable();
            $table->float('preco');
            $table->integer('quartos');
            $table->integer('cozinha');
            $table->integer('casa_de_banho');
            $table->string('estado')->default('pendente');
            $table->string('plano')->default('free');
            $table->date('plano_expiracao')->nullable();
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
