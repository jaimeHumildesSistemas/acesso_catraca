<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formapagamento', function (Blueprint $table) {
            $table->id(); // Isso cria campo id (auto_increment, PK)
            $table->string('descricao', 255);
        });

        // Inserir os dados iniciais
        DB::table('formapagamento')->insert([
            ['descricao' => 'Pix'],
            ['descricao' => 'Cartão Visa'],
            ['descricao' => 'Cartão Master'],
            ['descricao' => 'Dinheiro'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('formapagamento');
    }
};
