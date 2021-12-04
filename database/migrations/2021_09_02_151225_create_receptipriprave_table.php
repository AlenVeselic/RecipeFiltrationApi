<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptipripraveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptipriprave', function (Blueprint $table) {
            $table->foreignId('recept_idrecepta')->references('idrecepta')->on('recepti');
            $table->foreignId('priprava_idpriprave')->references('idpriprave')->on('priprave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptipriprave');
    }
}
