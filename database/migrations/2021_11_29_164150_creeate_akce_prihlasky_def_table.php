<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateAkcePrihlaskyDefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akce_prihlasky_def', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('apd_id');
            $table->primary('apd_id');
            $table->unsignedBigInteger('ak_id');
            $table->foreign('ak_id')
                ->references('ak_id')
                ->on('akce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->date('apd_konec_prihlasek');
            $table->string('apd_kategorie',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akce_prihlasky_def');
    }
}
