<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluxoCaixa extends Model
{
    protected $table = 'fluxocaixa';

    protected $fillable = [
        'idcaixaheader',
        'idfilial',
        'tipo',
        'valor',
        'descricao',
        'dataregistro',
    ];

    public function caixa()
    {
        return $this->belongsTo(CaixaHeader::class, 'idcaixaheader');
    }
}
