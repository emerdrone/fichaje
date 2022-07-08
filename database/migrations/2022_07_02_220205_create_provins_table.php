<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsTable extends Migration
{

    public function up()
    {
        Schema::create('provins', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);

            $table->foreignId('territorio_id')->nullable()
            ->constrained('territorios')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provins');
    }
}
