<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateAkcePrihlaskaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akce_prihlaska', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('pr_id');
            $table->primary('pr_id');
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
            $table->string('pr_kategorie', 255);
            $table->string('pr_poznamka', 255);
            $table->dateTime('pr_datum_prihlaseni');
            $table->tinyInteger('pr_ucast')
                ->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akce_prihlaska');
    }
}
