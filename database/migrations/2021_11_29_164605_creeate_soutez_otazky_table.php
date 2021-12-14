<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateSoutezOtazkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutez_otazky', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('sot_id');
            $table->date('sot_start');
            $table->date('sot_end');
            $table->text('sot_textot');
            $table->text('sot_odpa');
            $table->text('sot_odpb');
            $table->text('sot_odpc');
            $table->text('sot_odpd');
            $table->text('sot_odpe');
            $table->text('sot_odpf');
            $table->text('sot_odpg');
            $table->text('sot_odph');
            $table->string('sot_sprodp', 3);
            $table->unsignedBigInteger('sot_autor');
            $table->tinyInteger('sot_status')
                ->default(0);
            $table->tinyInteger('sot_tema')
                ->default(0);
            $table->tinyInteger('sot_typ')
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
        Schema::dropIfExists('soutez_otazky');
    }
}
