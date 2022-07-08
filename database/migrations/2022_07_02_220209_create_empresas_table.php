<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{

    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('Direccion', 150)->nullable();
            $table->string('Cp', 10)->nullable();
            $table->string('Nif', 15)->nullable();
            $table->string('Telefono', 15)->nullable();
            $table->string('Email', 90)->nullable();

            $table->foreignId('provin_id')->nullable()
                ->constrained('provins')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

            $table->foreignId('territorio_id')->nullable()
            ->constrained('territorios')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

            $table->foreignId('localidad_id')->nullable()
            ->constrained('localidads')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
