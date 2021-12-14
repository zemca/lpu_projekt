<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateZavodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zavody', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('za_id');
            $table->tinyInteger('za_status')
                ->default(0);
            $table->string('za_oris', 64)
                ->nullable();
            $table->tinyInteger('za_typ')
                ->default(0);
            $table->string('za_nazev', 100);
            $table->string('za_misto', 200);
            $table->date('za_termin')
                ->nullable();
            $table->time('za_termin_cas')
                ->default(0);
            $table->date('za_konec_datum')
                ->nullable();
            $table->time('za_konec_cas')
                ->default(0);
            $table->date('za_konec_prihl')
                ->nullable();
            $table->tinyInteger('za_obdobi')
                ->default(0);
            $table->string('za_oddil', 10);
            $table->tinyInteger('za_doprava')
                ->default(0);
            $table->float('za_cena_dopravy', 6)
                ->default(0.00);
            $table->tinyInteger('za_ubytovani')
                ->default(0);
            $table->float('za_cena_ubytovani', 6)
                ->default(0.00);
            $table->string('za_web', 100)
                ->nullable();
            $table->text('za_poznamka')
                ->nullable();
            $table->tinyInteger('za_ucast')
                ->default(0);
            $table->string('za_odjcas', 10)
                ->nullable();
            $table->tinyInteger('za_odjmisto')
                ->default(0);
            $table->string('za_vysledky', 128)
                ->default('0');
            $table->string('za_zebr0', 32)
                ->default('0');
            $table->string('za_zebr1', 32)
                ->default('0');
            $table->string('za_zebr2', 32)
                ->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zavody');
    }
}
