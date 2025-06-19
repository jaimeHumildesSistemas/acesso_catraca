<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFluxocaixaTable extends Migration
{
    public function up()
    {
        Schema::create('fluxocaixa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcaixaheader');
            $table->enum('tipo', ['credito', 'debito']);
            $table->decimal('valor', 10, 2);
            $table->string('descricao', 255)->nullable();
            $table->dateTime('dataregistro')->default(now());
            $table->timestamps();

            $table->foreign('idcaixaheader')->references('id')->on('caixa_header')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fluxocaixa');
    }
}
