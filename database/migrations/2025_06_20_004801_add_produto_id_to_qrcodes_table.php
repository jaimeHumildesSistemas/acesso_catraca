<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('qrcodes', function (Blueprint $table) {
        $table->unsignedBigInteger('produto_id')->nullable()->after('user_id');
        $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('qrcodes', function (Blueprint $table) {
        $table->dropForeign(['produto_id']);
        $table->dropColumn('produto_id');
    });
}

};
