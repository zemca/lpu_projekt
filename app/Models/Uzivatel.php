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
}
