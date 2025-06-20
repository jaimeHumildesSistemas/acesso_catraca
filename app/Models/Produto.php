<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $primaryKey = 'idproduto';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
    'descricao',
    'valor',
    'user_ins',
    'data_ins',
    'user_upd',
    'data_upd',
];

public function produto()
{
    return $this->belongsTo(Produto::class, 'produto_id', 'idproduto');
}

public function userCriador()
{
    return $this->belongsTo(\App\Models\User::class, 'user_ins');
}
public function userAtualizador()
{
    return $this->belongsTo(\App\Models\User::class, 'user_upd');
}


}
