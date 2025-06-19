<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameFilialTableToFiliaisTable extends Migration
{
    public function up()
    {
        Schema::rename('filial', 'filiais');
    }

    public function down()
    {
        Schema::rename('filiais', 'filial');
    }
}
