<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->date('datafechamento')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('caixa_header', function (Blueprint $table) {
            $table->date('datafechamento')->nullable(false)->change();
        });
    }
};
