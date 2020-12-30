<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('cedula', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->time('ultima_compra', 0);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente', 50)->nullable();
            $table->string('persona_registra', 50)->nullable();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('cascade'); 
            $table->enum('estado', ['PEDIDO', 'PAGADA', 'ENVIADA'])->default('PEDIDO');   
            $table->string('comprobante', 500)->charset('utf8mb4')->nullable();
            $table->double('total', 8, 2);
            $table->double('costo_envio', 8, 2);
            $table->time('fecha_envio', 0);
            $table->time('fecha_recepcion', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('clientes');

    }
}
