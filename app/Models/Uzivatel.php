<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Uzivatel extends Authenticatable
{
    protected $table = 'uzivatele';

    protected $primaryKey = 'uz_id';

    public $timestamps = false;

    protected $guarded = [
        'uz_id'
    ];

    protected $fillable = [
        'uz_jmeno',
        'uz_prijmeni',
        'uz_login',
        'uz_reg_cislo',
        'uz_licence',
        'uz_cip',
        'uz_mobil',
        'uz_email',
        'uz_icq',
        'uz_vklady',
        'uz_vydaje',
        'uz_placprisp',
        'uz_aktivita',
        'uz_prisp1',
        'uz_prisp2',
        'uz_maillist',
        'uz_naroz',
        'uz_registrace',
        'uz_rodcislo',
        'uz_zeme',
        'uz_zust_loni',
        'uz_todelete',
        'uz_prihl_ost',
        'uz_mailtrenink'
    ];

    protected $hidden = [
        'uz_heslo'
    ];

    /**
     *
     * @return mixed
     */

    public function getAuthPassword()
    {
        return $this->uz_heslo;
    }

    public function getAuthIdentifier()
    {
        return $this->uz_id;
    }

    // tabulka závisí na

    // tabulky závislé na této tabulce
    public function admin()
    {
        return $this->hasOne(Admin::class, 'uz_id', 'uz_id');
    }
    public function akce()
    {
        return $this->hasMany(Akce::class, 'ak_spravce', 'uz_id');
    }
    public function akce_komentar()
    {
        return $this->hasMany(Akce_komentar::class, 'uz_id', 'uz_id');
    }
    public function akce_prihlaska()
    {
        return $this->hasMany(Akce_prihlaska::class, 'uz_id', 'uz_id');
    }
    public function bazar()
    {
        return $this->hasMany(Bazar::class, 'uz_id', 'uz_id');
    }
    public function chattr()
    {
        return $this->hasMany(Chattr::class, 'tr_autor', 'uz_id');
    }
    public function diskuze()
    {
        return $this->hasMany(Diskuze::class, 'di_autor', 'uz_id');
    }
    public function login_check()
    {
        return $this->hasMany(Login_check::class, 'lc_uzid', 'uz_id');
    }
    public function obleceni()
    {
        return $this->hasMany(Obleceni::class, 'uz_id', 'uz_id');
    }
    public function poradani()
    {
        return $this->hasMany(Poradani::class, 'uz_id', 'uz_id');
    }
    public function prihlasky()
    {
        return $this->hasMany(Prihlasky::class, 'uz_id', 'uz_id');
    }
    public function prihlaskyvic()
    {
        return $this->hasMany(Prihlaskyvic::class, 'uz_id', 'uz_id');
    }
    public function soutez_odpovedi()
    {
        return $this->hasMany(Soutez_odpovedi::class, 'uz_id', 'uz_id');
    }
    public function soutez_otazky()
    {
        return $this->hasMany(Soutez_otazky::class, 'sot_autor', 'uz_id');
    }
    public function tmakce()
    {
        return $this->hasMany(Tmakce::class, 'uz_id', 'uz_id');
    }
    public function vklady()
    {
        return $this->hasMany(Vklady::class, 'uz_id', 'uz_id');
    }
    public function zebprihl()
    {
        return $this->hasMany(Zebprihl::class, 'uz_id', 'uz_id');
    }

}
