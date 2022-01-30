<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akce extends Model
{
    protected $table = 'akce';

    protected $primaryKey = 'ak_id';

    public $timestamps = false;

    protected $guarded = [
        'ak_id'
    ];

    protected $fillable = [
        'ak_status',
        'ak_typ',
        'ak_nazev',
        'ak_misto',
        'ak_popis',
        'ak_detail',
        'ak_zacatek_datum',
        'ak_zacatek_cas',
        'ak_konec_datum',
        'ak_konec_cas',
        'ak_externi_odkazy',
        'ak_komentare',
        'ak_typ_prihlasek',
        'ak_porada',
        'ak_spravce',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'ak_spravce', 'uz_id');
    }

    // tabulky závislé na této tabulce
    public function akce_komentar()
    {
        return $this->hasMany(Akce_komentar::class, 'ak_id', 'ak_id');
    }
    public function akce_prihlaska()
    {
        return $this->hasMany(Akce_prihlaska::class, 'ak_id', 'ak_id');
    }
    public function akce_prihlasky_def()
    {
        return $this->hasMany(Akce_prihlasky_def::class, 'ak_id', 'ak_id');
    }
}
