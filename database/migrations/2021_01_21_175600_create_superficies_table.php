<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperficiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superficies', function (Blueprint $table) {
            $table->id();
            $table->string('color', 50)->nullable();
            $table->enum('estado', ['EVAFOMIX', 'TELA', 'CORRUGADO','CUERINA'])->nullable();
            $table->string('eva_media', 50)->nullable();
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
        Schema::dropIfExists('superficies');
    }
}
