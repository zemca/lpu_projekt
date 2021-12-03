<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateZavvicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zavvic', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('za_id');
            $table->primary('za_id');
            $table->tinyInteger('za_status')
                ->default(0);
            $table->string('za_oris', 64)
                ->nullable();
            $table->string('za_nazev', 100);
            $table->string('za_misto', 200);
            $table->string('za_termintext', 25);
            $table->date('za_terminzac')
                ->nullable();
            $table->time('za_terminzac_cas')
                ->default(0);
            $table->date('za_konec_datum')
                ->nullable();
            $table->time('za_konec_cas')
                ->default(0);
            $table->string('za_oddil', 10);
            $table->text('za_kateg1');
            $table->string('za_ubytpopis', 512);
            $table->string('za_ubyt', 255);
            $table->string('za_ubytvklad', 255);
            $table->string('za_dopravapopis', 512);
            $table->string('za_doprava', 255);
            $table->string('za_dopravavklad', 255);
            $table->string('za_program1popis', 512);
            $table->string('za_program1', 255);
            $table->string('za_program1vklad', 255);
            $table->string('za_program2popis', 512);
            $table->string('za_program2', 255);
            $table->string('za_program2vklad', 255);
            $table->string('za_web', 100);
            $table->text('za_poznamka');
            $table->text('za_platba');
            $table->tinyInteger('za_terminprihl')
                ->default(0);
            $table->integer('za_vedouci')
                ->default(0);
            $table->string('za_vysledky', 128)
                ->default('0');
            $table->string('za_zebricek', 32)
                ->default('0');
            $table->dateTime('za_mail_posledni');
            $table->tinyInteger('za_typ_kateg')
                ->default(1);
            $table->string('za_zkratka', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zavvic');
    }
}
