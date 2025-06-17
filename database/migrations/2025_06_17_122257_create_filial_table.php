<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialTable extends Migration
{
    public function up()
    {
        Schema::create('filial', function (Blueprint $table) {
            $table->id(); // id bigint auto increment
            $table->string('nomedafilial');
            $table->string('endereco');
            $table->string('nun_end');  // número do endereço, pode ser string caso tenha letras
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf', 2);    // UF geralmente tem 2 caracteres
            $table->string('cep', 9);   // CEP com 8 dígitos + hífen (ex: 12345-678)
            $table->timestamps();       // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('filial');
    }
}
