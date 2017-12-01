<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenserviciosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->decimal('precio',8,2);
            $table->dateTime('fecha');
            $table->integer('idservicio')->unsigned();
            $table->foreign('idservicio')->references('id')->on('servicios');
            $table->integer('idestado')->unsigned();
            $table->foreign('idestado')->references('id')->on('estados_orden_servicio');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->integer('idcupon')->unsigned();
            $table->foreign('idcupon')->references('id')->on('cupones');
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
        Schema::dropIfExists('orden_servicios');
    }
}
