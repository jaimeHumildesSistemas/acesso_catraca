<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $table = 'qrcodes';

    // Adicione 'user_id' aqui:
    protected $fillable = ['code', 'used_at', 'user_id'];

    public function isUsed()
    {
        return !is_null($this->used_at);
    }
}
