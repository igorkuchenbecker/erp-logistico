<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    protected $fillable = [
        'codigo',
        'peso',
        'tipo_item',
        'origem',
        'destino',
        'status',
        'observacao',
    ];
}
