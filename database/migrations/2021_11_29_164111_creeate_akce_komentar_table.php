<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->unsignedBigInteger('uz_id');
            $table->unsignedBigInteger('ak_id');
            $table->dateTime('ako_datumcas')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
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
