<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataClimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_climas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_estacion');
            $table->string('nombre_estacion');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('altitud');
            $table->float('precipitaciones');
            $table->float('temperatura_maxima');
            $table->float('temperatura_minima');
            $table->string('fecha');
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
        Schema::dropIfExists('data_climas');
    }
}
