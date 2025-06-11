<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $table = 'qrcodes';

    protected $fillable = ['code', 'used_at'];

    public function isUsed()
    {
        return !is_null($this->used_at);
    }
}
