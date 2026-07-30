<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    protected $table = 'ufs';

    protected $fillable = [
        'codigo',
        'codigo_rastreio',
        'peso',
        'tipo_item',
        'origem',
        'destino',
        'status',
        'tipo_caminhao',
        'colaborador',
        'trajeto',
        'prazo_entrega',
        'observacao',
    ];

    protected $casts = [
        'prazo_entrega' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($uf) {
            if (!$uf->codigo) {
                $uf->codigo = (static::max('codigo') ?? 10000) + 1;
            }
        });
    }

    public static function gerarRastreio(UF $uf): void
    {
        if ($uf->status === 'em_transito' && !$uf->codigo_rastreio) {
            $uf->codigo_rastreio = (string) rand(1000, 9999);
            $uf->prazo_entrega = now()->addDays(2);
        }
    }
}
