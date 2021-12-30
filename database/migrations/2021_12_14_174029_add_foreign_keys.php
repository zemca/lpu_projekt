<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('akce', function (Blueprint $table) {
            $table->foreign('ak_spravce')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('akce_komentar', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('ak_id')
                ->references('ak_id')
                ->on('akce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('akce_prihlaska', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('ak_id')
                ->references('ak_id')
                ->on('akce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('akce_prihlasky_def', function (Blueprint $table) {
            $table->foreign('ak_id')
                ->references('ak_id')
                ->on('akce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('bazar', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('bzsoubor', function (Blueprint $table) {
            $table->foreign('bz_id')
                ->references('bz_id')
                ->on('bazar')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('chattr', function (Blueprint $table) {
            $table->foreign('tr_autor')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('diskuze', function (Blueprint $table) {
            $table->foreign('di_autor')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('login_check', function (Blueprint $table) {
            $table->foreign('lc_uzid')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('obleceni', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('poradani', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('prihlasky', function (Blueprint $table) {
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavody')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('prihlaskyvic', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavody')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('soutez_odpovedi', function (Blueprint $table) {
            $table->foreign('sot_id')
                ->references('sot_id')
                ->on('soutez_otazky')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('tmakce', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('tmsoubor', function (Blueprint $table) {
            $table->foreign('tm_id')
                ->references('tm_id')
                ->on('tmakce')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('vklady', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('zavody_kategorie', function (Blueprint $table) {
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavody')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('zavvic_termin_prihlasek', function (Blueprint $table) {
            $table->foreign('za_id')
                ->references('za_id')
                ->on('zavvic')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('zebprihl', function (Blueprint $table) {
            $table->foreign('uz_id')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
            $table->foreign('ze_id')
                ->references('ze_id')
                ->on('zebricek')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
        Schema::table('soutez_otazky', function (Blueprint $table) {
            $table->foreign('sot_autor')
                ->references('uz_id')
                ->on('uzivatele')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropForeign('admin_uz_id_foreign');
        });
        Schema::table('akce', function (Blueprint $table) {
            $table->dropForeign('akce_ak_spravce_foreign');
        });
        Schema::table('akce_komentar', function (Blueprint $table) {
            $table->dropForeign('akce_komentar_ak_id_foreign');
            $table->dropForeign('akce_komentar_uz_id_foreign');
        });
        Schema::table('akce_prihlaska', function (Blueprint $table) {
            $table->dropForeign('akce_prihlaska_ak_id_foreign');
            $table->dropForeign('akce_prihlaska_uz_id_foreign');
        });
        Schema::table('akce_prihlasky_def', function (Blueprint $table) {
            $table->dropForeign('akce_prihlasky_def_ak_id_foreign');
        });
        Schema::table('bazar', function (Blueprint $table) {
            $table->dropForeign('bazar_uz_id_foreign');
        });
        Schema::table('bzsoubor', function (Blueprint $table) {
            $table->dropForeign('bzsoubor_bz_id_foreign');
        });
        Schema::table('chattr', function (Blueprint $table) {
            $table->dropForeign('chattr_tr_autor_foreign');
        });
        Schema::table('diskuze', function (Blueprint $table) {
            $table->dropForeign('diskuze_di_autor_foreign');
        });
        Schema::table('login_check', function (Blueprint $table) {
            $table->dropForeign('login_check_lc_uzid_foreign');
        });
        Schema::table('obleceni', function (Blueprint $table) {
            $table->dropForeign('obleceni_uz_id_foreign');
        });
        Schema::table('poradani', function (Blueprint $table) {
            $table->dropForeign('poradani_uz_id_foreign');
        });
        Schema::table('prihlasky', function (Blueprint $table) {
            $table->dropForeign('prihlasky_uz_id_foreign');
            $table->dropForeign('prihlasky_za_id_foreign');
        });
        Schema::table('prihlaskyvic', function (Blueprint $table) {
            $table->dropForeign('prihlaskyvic_uz_id_foreign');
            $table->dropForeign('prihlaskyvic_za_id_foreign');
        });
        Schema::table('soutez_odpovedi', function (Blueprint $table) {
            $table->dropForeign('soutez_odpovedi_sot_id_foreign');
            $table->dropForeign('soutez_odpovedi_uz_id_foreign');
        });
        Schema::table('tmakce', function (Blueprint $table) {
            $table->dropForeign('tmakce_uz_id_foreign');
        });
        Schema::table('tmsoubor', function (Blueprint $table) {
            $table->dropForeign('tmsoubor_tm_id_foreign');
        });
        Schema::table('vklady', function (Blueprint $table) {
            $table->dropForeign('vklady_uz_id_foreign');
        });
        Schema::table('zavody_kategorie', function (Blueprint $table) {
            $table->dropForeign('zavody_kategorie_za_id_foreign');
        });
        Schema::table('zavvic_termin_prihlasek', function (Blueprint $table) {
            $table->dropForeign('zavvic_termin_prihlasek_za_id_foreign');
        });
        Schema::table('zebprihl', function (Blueprint $table) {
            $table->dropForeign('zebprihl_uz_id_foreign');
            $table->dropForeign('zebprihl_ze_id_foreign');
        });
        Schema::table('soutez_otazky', function (Blueprint $table) {
            $table->dropForeign('soutez_otazky_sot_autor_foreign');
        });
    }
}
