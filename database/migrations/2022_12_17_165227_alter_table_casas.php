<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCasas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('casas', function (Blueprint $table) {
        
            $table->unsignedBigInteger('id_categoria')->references('id')->on('categorias')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_sub_categoria')->references('id')->on('sub_categorias')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_provincia')->references('id')->on('provincias')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_municipio')->references('id')->on('municipios')->onDelete('CASCADE')->onUpdate('CASCADE')->nullable();
           
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
