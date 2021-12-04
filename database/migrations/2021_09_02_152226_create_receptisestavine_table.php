<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptisestavineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptisestavine', function (Blueprint $table) {
            $table->foreignId('idRecepta')->references('idrecepta')->on('recepti');
            $table->foreignId('idSestavine')->references('idSestavine')->on('sestavine');
            $table->float('kolicina');
            $table->string('enota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptisestavine');
    }
}
