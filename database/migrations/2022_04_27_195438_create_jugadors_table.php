<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();   

            $table->string('Nombre', 25);
            $table->string('Apellido', 25);
            $table->date('FechaDeNacimiento');
            $table->integer('Edad');
            $table->enum('Sexo', ['Masculino', 'Femenino']);
            $table->enum('EquipoFavorito', ['River Plate', 'Boca Juniors', 'Independiente', 'Racing Club', 'Otro']);
            $table->string('OtroEquipo', 30)->nullable();;
            $table->enum('PosicionPreferida', ['Arquero', 'Defensa', 'Mediocampista', 'Delantero']);
            $table->string('Telefono', 35);
            $table->string('Direccion', 75);
            $table->string('Foto');

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
        Schema::dropIfExists('jugadors');
    }
};
