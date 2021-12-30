<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateAkceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akce', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('ak_id');
            $table->tinyInteger('ak_status')
                ->default(0);
            $table->smallInteger('ak_typ')
                ->default(0);
            $table->string('ak_nazev', 100);
            $table->string('ak_misto', 200);
            $table->text('ak_popis');
            $table->text('ak_detail');
            $table->date('ak_zacatek_datum');
            $table->time('ak_zacatek_cas')
                ->default(0);
            $table->date('ak_konec_datum');
            $table->time('ak_konec_cas')
                ->default(0);
            $table->string('ak_externi_odkazy', 200);
            $table->tinyInteger('ak_komentare')
                ->default(0);
            $table->smallInteger('ak_typ_prihlasek')
                ->default(0);
            $table->string('ak_porada', 100);
            $table->unsignedBigInteger('ak_spravce');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akce');
    }
}
