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
    ];
}
