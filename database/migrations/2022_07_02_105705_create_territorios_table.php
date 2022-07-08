<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoriosTable extends Migration
{
    public function up()
    {
        Schema::create('territorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('territorios');
    }
}
