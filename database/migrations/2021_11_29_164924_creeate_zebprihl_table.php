<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateZebprihlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zebprihl', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('zp_id');
            $table->primary('zp_id');
            $table->unsignedBigInteger('uz_id');
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->unsignedBigInteger('ze_id');
            $table->foreign('ze_id')
                ->references('ze_id')
                ->on('zebricek')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->string('zp_kategorie', 6);
            $table->string('zp_prijmeni', 33);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zebprihl');
    }
}
