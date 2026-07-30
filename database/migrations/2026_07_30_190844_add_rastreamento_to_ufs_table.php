<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ufs', function (Blueprint $table) {
            $table->string('codigo_rastreio')->nullable()->unique()->after('codigo');
            $table->string('tipo_caminhao')->nullable()->after('status');
            $table->string('colaborador')->nullable()->after('tipo_caminhao');
            $table->string('trajeto')->nullable()->after('colaborador');
            $table->dateTime('prazo_entrega')->nullable()->after('trajeto');
        });
    }

    public function down(): void
    {
        Schema::table('ufs', function (Blueprint $table) {
            $table->dropColumn(['codigo_rastreio', 'tipo_caminhao', 'colaborador', 'trajeto', 'prazo_entrega']);
        });
    }
};
