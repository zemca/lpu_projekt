<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePrihlasky extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prihlasky', function (Blueprint $table) {
            $table->dropColumn('pr_datum'); // zbytečné, je uloženo v tabulce zavody
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prihlasky', function (Blueprint $table) {
            $table->addColumn('date','pr_datum')->nullable();
        });
    }
}
