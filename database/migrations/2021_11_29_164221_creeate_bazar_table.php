<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateBazarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('bz_id');
            $table->unsignedBigInteger('uz_id');
            $table->tinyInteger('bz_bzdopr')
                ->default(0);
            $table->string('bz_doprdatum', 32)
                ->nullable();
            $table->string('bz_doprpocet', 32)
                ->nullable();
            $table->tinyInteger('bz_typ')
                ->default(0);
            $table->integer('bz_rodic')
                ->default(0);
            $table->dateTime('bz_datum')
                ->nullable();
            $table->string('bz_nadpis', 255)
                ->nullable();
            $table->text('bz_popis')
                ->nullable();
            $table->string('bz_odkaz', 255)
                ->nullable();
            $table->tinyInteger('bz_status')
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
        Schema::dropIfExists('bazar');
    }
}
