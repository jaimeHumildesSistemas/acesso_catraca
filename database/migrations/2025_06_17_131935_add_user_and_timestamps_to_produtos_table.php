<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('idproduto');          // Primary Key personalizada
            $table->string('descricao');                 // Campo descrição
            $table->decimal('valor', 10, 2);             // Campo valor
            $table->unsignedBigInteger('user_ins')->nullable();  // Usuário que criou
            $table->timestamp('data_ins')->nullable();           // Data de criação
            $table->unsignedBigInteger('user_upd')->nullable();  // Usuário que atualizou
            $table->timestamp('data_upd')->nullable();           // Data de atualização
            $table->timestamps();                          // Campos padrão: created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
