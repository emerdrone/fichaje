<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichajesTable extends Migration
{
    public function up()
    {
        Schema::create('fichajes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('horainicio')->nullable();
            $table->timestamp('horafin')->nullable();
            $table->string('estadofichaje',1)->nullable();
            $table->string('geolatini',30)->nullable();
            $table->string('geolonini', 30)->nullable();

            $table->foreignId('user_id')
            ->constrained('users')
                ->cascadeOnDelete()
                ->restrictOnUpdate();




            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fichajes');
    }
}
