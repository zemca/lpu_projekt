<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreeateChattrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chattr', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('tr_id');
            $table->dateTime('tr_datum')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('tr_odkaz', 200);
            $table->string('tr_podpis', 35);
            $table->text('tr_text');
            $table->unsignedBigInteger('tr_autor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chattr');
    }
}
