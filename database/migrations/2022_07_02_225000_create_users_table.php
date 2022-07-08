<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('cp', 10)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('comentario', 100)->nullable();

            $table->foreignId('empresa_id')->nullable()
            ->constrained('empresas')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

            $table->foreignId('provin_id')->nullable()
                ->constrained('provins')
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
        Schema::dropIfExists('users');
    }
};
