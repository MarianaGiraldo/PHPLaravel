<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeCamposEstructuraCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informes', function (Blueprint $table) {
            $table-> string('CategoriaGasto');
            $table-> date('FechaInforme')->nullable($value = true);
            $table-> integer('idTrabajador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informes', function (Blueprint $table) {
            $table->dropColumn('CategoriaGasto');
            $table->dropColumn('FechaInforme');
            $table->dropColumn('idTrabajador');
        });
    }
}
