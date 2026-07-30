<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ufs', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->decimal('peso', 10, 2);
            $table->string('tipo_item');
            $table->string('origem');
            $table->string('destino');
            $table->string('status')->default('pendente');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ufs');
    }
};
