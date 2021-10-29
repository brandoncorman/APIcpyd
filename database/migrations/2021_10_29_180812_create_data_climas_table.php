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
            $table->integer('codigo_estacion')->nullable();
            $table->string('nombre_estacion')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('altitud')->nullable();
            $table->float('precipitaciones')->nullable();
            $table->float('temperatura_maxima')->nullable();
            $table->float('temperatura_minima')->nullable();
            $table->string('fecha')->nullable();
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
