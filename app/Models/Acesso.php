<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    protected $fillable = ['user_id', 'qrcode_id', 'data_hora'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function qrcode() {
        return $this->belongsTo(QRCode::class);
    }
}
