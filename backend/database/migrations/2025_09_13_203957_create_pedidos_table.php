<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();                  // ID do pedido
            $table->string('cliente');     // Nome do cliente
            $table->decimal('total', 10, 2); // Total do pedido, com 2 casas decimais, máximo 10 dígitos
            $table->string('status');      // Status (ex: pendente, concluído)
            $table->timestamps();          // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
