<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageOrientedDataToReceptiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepti', function (Blueprint $table) {
            //
            $table->string('imagelink')->nullable();
            $table->string('originalDimensions')->nullable();
            $table->string('localImageLocation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recepti', function (Blueprint $table) {
            //
            $table->dropColumn('imagelink');
            $table->dropColumn('originalDimensions');
            $table->dropColumn('localImageLocation');
        });
    }
}
