<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $table = 'qrcodes';

    protected $fillable = [
        'code',
        'used_at',
        'user_id',
        'idproduto',
        'idfilial',
        'valor',
        'desconto',
        'acrescimo',
        'valorapagar',
        'formadepagamento',
        'status',
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com o produto
    public function produto()
    {
        // 'idproduto' é a FK na tabela qrcodes
        return $this->belongsTo(Produto::class, 'idproduto', 'idproduto');
    }

    // Relacionamento com filial (se tiver model Filial)
    public function filial()
    {
        return $this->belongsTo(Filial::class, 'idfilial', 'id');
    }

    // Verifica se QR Code foi usado
    public function isUsed()
    {
        return !is_null($this->used_at);
    }
}
