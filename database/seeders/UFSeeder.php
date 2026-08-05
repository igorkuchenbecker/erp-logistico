<?php

namespace Database\Seeders;

use App\Models\UF;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UFSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $dados = [
            ['codigo' => 10001, 'origem' => 'ARM-MACAÉ', 'destino' => 'BMAC', 'peso' => 4.2, 'tipo_item' => 'Palete',
             'status' => 'entregue', 'tipo_caminhao' => 'Toco', 'colaborador' => 'Carlos Henrique',
             'trajeto' => 'ARM-MACAÉ → BMAC', 'observacao' => 'Palete de tubos de revestimento.'],
            ['codigo' => 10002, 'origem' => 'IMBETIBA', 'destino' => 'BMAC', 'peso' => 1.8, 'tipo_item' => 'Caixa de madeira',
             'status' => 'entregue', 'tipo_caminhao' => 'Truck', 'colaborador' => 'Anderson Lima',
             'trajeto' => 'IMBETIBA → BMAC', 'observacao' => 'Caixa com ferramentas de sondagem.'],
            ['codigo' => 10003, 'origem' => 'IMBOASSICA', 'destino' => 'PACU', 'peso' => 8.5, 'tipo_item' => 'Palete',
             'status' => 'em_transito', 'tipo_caminhao' => 'Bitruck', 'colaborador' => 'Marcos Vinícius',
             'trajeto' => 'IMBOASSICA → BR-101 → PACU', 'observacao' => 'Paletes de madeira tratada.'],
            ['codigo' => 10004, 'origem' => 'ARM-RIO', 'destino' => 'BMAC', 'peso' => 0.9, 'tipo_item' => 'Mala Case',
             'status' => 'em_transito', 'tipo_caminhao' => 'VUC', 'colaborador' => 'Rafael Oliveira',
             'trajeto' => 'ARM-RIO → BR-101 → BMAC', 'observacao' => 'Mala Case com instrumentos eletrônicos.'],
            ['codigo' => 10005, 'origem' => 'ARM-MACAÉ', 'destino' => 'PACU', 'peso' => 2.3, 'tipo_item' => 'Caixa de papelão',
             'status' => 'liberado_programacao', 'tipo_caminhao' => 'Toco', 'colaborador' => 'Diego Santos',
             'trajeto' => 'ARM-MACAÉ → BR-101 → PACU', 'observacao' => null],
            ['codigo' => 10006, 'origem' => 'IMBETIBA', 'destino' => 'BMAC', 'peso' => 1.1, 'tipo_item' => 'Plástico',
             'status' => 'unitizado', 'tipo_caminhao' => 'VUC', 'colaborador' => 'Júlio César',
             'trajeto' => 'IMBETIBA → BMAC', 'observacao' => 'Tambores plásticos lacrados.'],
            ['codigo' => 10007, 'origem' => 'IMBOASSICA', 'destino' => 'BMAC', 'peso' => 3.7, 'tipo_item' => 'Amarrado',
             'status' => 'coletado', 'tipo_caminhao' => 'Truck', 'colaborador' => 'Fábio Martins',
             'trajeto' => 'IMBOASSICA → BMAC', 'observacao' => 'Carga amarrada com lonas.'],
            ['codigo' => 10008, 'origem' => 'ARM-RIO', 'destino' => 'PACU', 'peso' => 0.6, 'tipo_item' => 'Caixa de papelão',
             'status' => 'aguardando_coleta', 'tipo_caminhao' => 'VUC', 'colaborador' => null,
             'trajeto' => 'ARM-RIO → BR-101 → PACU', 'observacao' => 'Documentação em andamento.'],
            ['codigo' => 10009, 'origem' => 'ARM-MACAÉ', 'destino' => 'BMAC', 'peso' => 5.0, 'tipo_item' => 'Palete',
             'status' => 'pendente', 'tipo_caminhao' => null, 'colaborador' => null,
             'trajeto' => 'ARM-MACAÉ → BMAC', 'observacao' => 'Aguardando liberação do armazém.'],
            ['codigo' => 10010, 'origem' => 'IMBETIBA', 'destino' => 'PACU', 'peso' => 1.4, 'tipo_item' => 'Mala Case',
             'status' => 'cancelado', 'tipo_caminhao' => 'Toco', 'colaborador' => 'Roberto Nunes',
             'trajeto' => 'IMBETIBA → BR-101 → PACU', 'observacao' => 'Cancelado por solicitação do cliente.'],
            ['codigo' => 10011, 'origem' => 'ARM-MACAÉ', 'destino' => 'BMAC', 'peso' => 2.9, 'tipo_item' => 'Caixa de madeira',
             'status' => 'entregue', 'tipo_caminhao' => 'Truck', 'colaborador' => 'Pedro Augusto',
             'trajeto' => 'ARM-MACAÉ → BMAC', 'observacao' => null],
            ['codigo' => 10012, 'origem' => 'IMBOASSICA', 'destino' => 'PACU', 'peso' => 6.3, 'tipo_item' => 'Palete',
             'status' => 'em_transito', 'tipo_caminhao' => 'Bitruck', 'colaborador' => 'Lucas Ferreira',
             'trajeto' => 'IMBOASSICA → BR-101 → PACU', 'observacao' => 'Paletes de aço.'],
            ['codigo' => 10013, 'origem' => 'ARM-RIO', 'destino' => 'BMAC', 'peso' => 0.8, 'tipo_item' => 'Plástico',
             'status' => 'em_transito', 'tipo_caminhao' => 'VUC', 'colaborador' => 'Thiago Rocha',
             'trajeto' => 'ARM-RIO → BR-101 → BMAC', 'observacao' => null],
            ['codigo' => 10014, 'origem' => 'ARM-MACAÉ', 'destino' => 'PACU', 'peso' => 4.8, 'tipo_item' => 'Amarrado',
             'status' => 'entregue', 'tipo_caminhao' => 'Truck', 'colaborador' => 'Sérgio Alves',
             'trajeto' => 'ARM-MACAÉ → BR-101 → PACU', 'observacao' => 'Carga amarrada, entrega confirmada.'],
        ];

        foreach ($dados as $item) {
            $uf = new UF($item);
            UF::gerarRastreio($uf);
            $uf->save();
        }
    }
}
