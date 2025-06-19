<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCaixaHeaderAddDatahoraAbertura extends Migration
{
    public function up()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            // Para adicionar o campo, se ainda não existe
            $table->timestamp('datahora_abertura')->nullable()->after('iduser');
            
            // Caso queira modificar o campo para não ser nullable:
            // $table->timestamp('datahora_abertura')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->dropColumn('datahora_abertura');
        });
    }
}
;
