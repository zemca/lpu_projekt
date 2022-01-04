<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminZavvicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termin_zavvic', function (Blueprint $table) {
            $table->id('ter_id');
            $table->unsignedBigInteger('za_id');
            $table->unsignedTinyInteger('ter_tag');
            $table->date('ter_datum');
        });
        Schema::table('termin_zavvic', function (Blueprint $table) {
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavvic')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('termin_zavvic', function (Blueprint $table) {
            $table->dropForeign('termin_zavvic_za_id_foreign');
        });
        Schema::dropIfExists('termin_zavvic');
    }
}
