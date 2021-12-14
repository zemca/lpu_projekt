<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateSoutezOdpovediTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutez_odpovedi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('sod_id');
            $table->unsignedBigInteger('sot_id');
            $table->unsignedBigInteger('uz_id');
            $table->string('sod_odp', 3);
            $table->tinyInteger('sod_zisk')
                ->default(0);
            $table->dateTime('sod_datum')
                ->nullable();
            $table->string('sod_ipadr', 50);
            $table->string('sod_host', 50);
            $table->tinyInteger('sod_tema')
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
        Schema::dropIfExists('soutez_odpovedi');
    }
}
