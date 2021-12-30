<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateDiskuzeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskuze', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('di_id');
            $table->dateTime('di_datum')
                ->default('CURRENT_TIMESTAMP');
            $table->string('di_nazev', 60);
            $table->string('di_podpis', 30);
            $table->text('di_text');
            $table->unsignedBigInteger('di_autor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskuze');
    }
}
