<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reatas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('logo', 50)->nullable();
            $table->string('code', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('imagen', 500)->charset('utf8mb4')->nullable();
            $table->enum('tipo', ['CUERO', 'TELA', 'TUBULAR']);   
            $table->enum('genero', ['HOMBRE', 'MUJER', 'UNISEX']);   
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
        Schema::dropIfExists('reatas');
    }
}
