<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateZavvicTerminPrihlasekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zavvic_termin_prihlasek', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('za_kat_id');
            $table->primary('za_kat_id');
            $table->unsignedBigInteger('za_id');
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavvic')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->date('konec_prihl');
            $table->text('vklad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zavvic_termin_prihlasek');
    }
}
