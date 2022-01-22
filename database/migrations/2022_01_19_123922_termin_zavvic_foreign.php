<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TerminZavvicForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }
}
