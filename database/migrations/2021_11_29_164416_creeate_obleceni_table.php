<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateObleceniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obleceni', function (Blueprint $table) {
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
            $table->string('ob_typ', 5);
            $table->string('ob_velikost', 16);
            $table->tinyInteger('ob_pocet')
                ->default(0);
            $table->string('ob_poznamka', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obleceni');
    }
}
