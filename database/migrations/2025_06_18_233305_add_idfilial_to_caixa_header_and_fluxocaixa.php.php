<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdfilialToCaixaHeaderAndFluxocaixa extends Migration
{
    public function up()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->unsignedBigInteger('idfilial')->after('iduser');

            $table->foreign('idfilial')
                  ->references('id')
                  ->on('filial')
                  ->onDelete('cascade');
        });

        Schema::table('fluxocaixa', function (Blueprint $table) {
            $table->unsignedBigInteger('idfilial')->after('idcaixaheader');

            $table->foreign('idfilial')
                  ->references('id')
                  ->on('filial')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->dropForeign(['idfilial']);
            $table->dropColumn('idfilial');
        });

        Schema::table('fluxocaixa', function (Blueprint $table) {
            $table->dropForeign(['idfilial']);
            $table->dropColumn('idfilial');
        });
    }
}
