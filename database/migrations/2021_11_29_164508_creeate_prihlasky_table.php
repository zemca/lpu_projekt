<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeatePrihlaskyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prihlasky', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('pr_id');
            $table->unsignedBigInteger('uz_id');
            $table->unsignedBigInteger('za_id');
            $table->string('pr_kategorie', 10);
            $table->float('pr_naklady', 6, 2)
                ->default(0.00);
            $table->tinyInteger('pr_doprava')
                ->default(0);
            $table->tinyInteger('pr_ubytovani')
                ->default(0);
            $table->date('pr_datum')
                ->nullable();
            $table->string('pr_prijmeni', 33);
            $table->text('pr_poznamka')
                ->nullable();
            $table->tinyInteger('pr_ucast')
                ->default(0);
            $table->dateTime('pr_datum_prihlaseni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prihlasky');
    }
}
