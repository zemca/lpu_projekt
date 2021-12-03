<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateAkceKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akce_komentar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('ako_id');
            $table->primary('ako_id');
            $table->unsignedBigInteger('uz_id');
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->unsignedBigInteger('ak_id');
            $table->foreign('ak_id')
                ->references('ak_id')
                ->on('akce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->dateTime('ako_datumcas');
            $table->text('ako_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akce_komentar');
    }
}
