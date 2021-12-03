<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateBzsouborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bzsoubor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('bzs_id');
            $table->primary('bzs_id');
            $table->unsignedBigInteger('bz_id');
            $table->foreign('bz_id')
                ->references('bz_id')
                ->on('bazar')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->tinyInteger('bzs_poradi')
                ->default(0);
            $table->string('bzs_cesta', 255);
            $table->string('bzs_popis', 128);
            $table->tinyInteger('bzs_status')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bzsoubor');
    }
}
