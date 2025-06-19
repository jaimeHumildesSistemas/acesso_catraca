<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaixaHeader extends Model
{
    protected $table = 'caixa_header';

    protected $fillable = [
        'iduser',
        'idfilial',
        'datafechamento',
        'total_bruto',
        'total_desconto',
        'total_acrescimo',
        'total_liquido',
        'formadepagamento',
    ];

    public function fluxos(): HasMany
    {
        return $this->hasMany(FluxoCaixa::class, 'idcaixaheader');
    }
}
