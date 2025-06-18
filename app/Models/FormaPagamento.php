cla<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;

    protected $table = 'formapagamento';

    protected $fillable = [
        'descricao',
    ];

    public $timestamps = false;  // Como a tabela não tem created_at / updated_at
}
