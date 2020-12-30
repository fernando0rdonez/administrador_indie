<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZapatillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('superficie', 50)->nullable();
            $table->foreignId('reata_id')->nullable()->constrained('reatas')->onDelete('cascade'); 
            $table->enum('tipo', ['EVAFOMIX', 'TELA', 'CORRUGADO']);   
            $table->enum('eva', ['BLANCA', 'NEGRA', 'CAFE']);   
            $table->enum('fibra', ['VAGE', 'NEGRA', 'CAFE']); 
            $table->enum('genero', ['HOMBRE', 'MUJER', 'UNISEX']);   
            $table->string('imagen', 500)->charset('utf8mb4')->nullable();  
            $table->double('costo', 8, 2);
            $table->double('valor', 8, 2);
            $table->string('keywords', 50)->nullable();
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
        Schema::dropIfExists('modelos');
    }
}
