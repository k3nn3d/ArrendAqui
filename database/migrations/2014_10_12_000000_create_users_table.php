<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('pontos')->default(0);
            $table->string('convite')->unique()->nullable();
            $table->integer('ativo')->default(0);
            $table->string('lastname');
            $table->string('telefone');
            $table->string('bi')->nullable();
            $table->string('carta')->nullable();
            $table->string('registro_criminal')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('biografia')->nullable();
            $table->integer('vc_tipo_utilizador')->default(6);
            $table->string('vc_path');
            $table->string('link');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('estado')->default('aceite');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
