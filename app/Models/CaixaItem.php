<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaixaItem extends Model
{
    protected $table = 'caixa_item';

    protected $fillable = [
        'iduser', 'datetime', 'idproduto', 'valor', 'desconto',
        'acrescimo', 'valorapagar', 'formadepagamento'
    ];

    public $timestamps = true;
}
