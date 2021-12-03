<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreeateUzivateleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzivatele', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_czech_ci';
            $table->id('uz_id');
            $table->primary('uz_id');
            $table->string('uz_jmeno', 24);
            $table->string('uz_prijmeni', 33);
            $table->string('uz_login', 10);
            $table->string('uz_heslo', 256);
            $table->string('uz_reg_cislo', 10);
            $table->char('uz_licence', 3)
                ->default('C');
            $table->integer('uz_cip')
                ->default(0);
            $table->string('uz_mobil', 33)
                ->nullable();
            $table->string('uz_email', 50)
                ->nullable();
            $table->string('uz_icq', 20)
                ->nullable();
            $table->float('uz_vklady')
                ->default(0.00);
            $table->float('uz_vydaje')
                ->default(0.00);
            $table->tinyInteger('uz_placprisp')
                ->default(0);
            $table->tinyInteger('uz_aktivita')
                ->default(0);
            $table->float('uz_prisp1', 2, 1)
                ->default(0.5);
            $table->float('uz_prisp2', 2, 1)
                ->default(0.5);
            $table->tinyInteger('uz_maillist')
                ->default(0);
            $table->string('uz_naroz', 10)
                ->default('0');
            $table->tinyInteger('uz_registrace')
                ->default(1);
            $table->string('uz_rodcislo', 16);
            $table->string('uz_zeme', 8)
                ->default('CZ');
            $table->float('uz_zust_loni')
                ->default(0.00);
            $table->tinyInteger('uz_todelete')
                ->default(0);
            $table->string('uz_prihl_ost', 100);
            $table->tinyInteger('uz_mailtrenink')
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
        Schema::dropIfExists('uzivatele');
    }
}
