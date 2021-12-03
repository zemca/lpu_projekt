<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateTmsouborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmsoubor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('tms_id');
            $table->primary('tms_id');
            $table->unsignedBigInteger('tm_id');
            $table->foreign('tm_id')
                ->references('tm_id')
                ->on('tmakce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->tinyInteger('tms_poradi')
                ->default(0);
            $table->string('tms_cesta', 255);
            $table->string('tms_popis', 128);
            $table->tinyInteger('tms_status')
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
        Schema::dropIfExists('tmsoubor');
    }
}
