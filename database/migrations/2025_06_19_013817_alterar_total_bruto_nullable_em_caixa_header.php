<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->decimal('total_bruto', 10, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->decimal('total_bruto', 10, 2)->nullable(false)->change();
        });
    }
};
