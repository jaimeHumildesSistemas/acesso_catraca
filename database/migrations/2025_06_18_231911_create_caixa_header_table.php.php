<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaixaHeaderTable extends Migration
{
    public function up()
    {
        Schema::create('caixa_header', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->dateTime('datafechamento');
            $table->decimal('total_bruto', 10, 2);
            $table->decimal('total_desconto', 10, 2);
            $table->decimal('total_acrescimo', 10, 2);
            $table->decimal('total_liquido', 10, 2);
            $table->string('formadepagamento', 100)->nullable();
            $table->timestamps();

            // FK opcional, se tiver tabela users
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('caixa_header');
    }
}
