<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepti', function (Blueprint $table) {
            $table->id('idrecepta');
            $table->string('ime');
            $table->text('opis');
            $table->smallInteger('velikostjedi');
            $table->text('navodila');
            $table->integer('caspriprave');
            $table->foreignId('idZahtevnosti')->references('idzahtevnosti')->on('zahtevnosti');
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
        Schema::dropIfExists('recepti');
    }
}
