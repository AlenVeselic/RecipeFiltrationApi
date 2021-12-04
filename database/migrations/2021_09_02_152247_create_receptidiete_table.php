<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptidieteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptidiete', function (Blueprint $table) {
            $table->foreignId('idRecepta')->references('idrecepta')->on('recepti');
            $table->foreignId('idDiete')->references('idDiete')->on('diete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptidiete');
    }
}
