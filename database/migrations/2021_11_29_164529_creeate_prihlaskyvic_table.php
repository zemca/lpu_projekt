<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeatePrihlaskyvicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prihlaskyvic', function (Blueprint $table) {
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
            $table->unsignedBigInteger('za_id');
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavody')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->string('pr_kategorie', 10);
            $table->tinyInteger('pr_ubytovani')
                ->default(-1);
            $table->tinyInteger('pr_doprava')
                ->default(-1);
            $table->tinyInteger('pr_program1')
                ->default(-1);
            $table->tinyInteger('pr_program2')
                ->default(-1);
            $table->text('pr_poznamka')
                ->nullable();
            $table->date('pr_datum')
                ->nullable();
            $table->string('pr_prijmeni', 33);
            $table->dateTime('pr_datumprihl');
            $table->tinyInteger('pr_terminprihl')
                ->default(0);
            $table->tinyInteger('pr_potvrzeni')
                ->default(0);
            $table->text('pr_poznamka')
                ->nullable();
            $table->float('pr_vklad');
            $table->dateTime('pr_datum_admin	')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prihlaskyvic');
    }
}
