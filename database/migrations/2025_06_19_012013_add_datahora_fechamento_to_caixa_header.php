<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatahoraFechamentoToCaixaHeader extends Migration
{
    public function up()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->dateTime('datahora_fechamento')->nullable()->after('datahora_abertura');
        });
    }

    public function down()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->dropColumn('datahora_fechamento');
        });
    }
}
