<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('razao_social');
            $table->string('email');
            $table->string('cidade');
            $table->string('uf');
            $table->integer('cep');
            $table->string('endereco');
            $table->string('bairro');
            $table->integer('numero');
            $table->string('complemento');
            $table->integer('cpf_cnpj',14);
            $table->integer('ddd');
            $table->integer('fone');
            $table->date('data_cadastro');
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
        Schema::dropIfExists('Person');
    }
}
