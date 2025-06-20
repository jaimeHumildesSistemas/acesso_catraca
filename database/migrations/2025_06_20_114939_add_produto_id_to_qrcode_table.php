<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdutoIdToQrcodeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id')->nullable()->after('id');

            // Se quiser criar a chave estrangeira (relacionamento com a tabela produtos)
            $table->foreign('produto_id')->references('idproduto')->on('produtos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qrcode', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
            $table->dropColumn('produto_id');
        });
    }
}
