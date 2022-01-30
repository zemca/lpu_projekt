<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zavody extends Model
{
    protected $table = 'zavody';

    protected $primaryKey = 'za_id';

    public $timestamps = false;

    protected $guarded = [
        'za_id'
    ];

    protected $fillable = [
        'za_status',
        'za_oris',
        'za_typ',
        'za_nazev',
        'za_misto',
        'za_termin',
        'za_termin_cas',
        'za_konec_datum',
        'za_konec_cas',
        'za_konec_prihl',
        'za_obdobi',
        'za_oddil',
        'za_doprava',
        'za_cena_dopravy',
        'za_ubytovani',
        'za_cena_ubytovani',
        'za_web',
        'za_poznamka',
        'za_ucast',
        'za_odjcas',
        'za_odjmisto',
        'za_vysledky',
        'za_zebr0',
        'za_zebr1',
        'za_zebr2',
    ];

    // tabulka závisí na

    // tabulky závislé na této tabulce
    public function prihlasky()
    {
        return $this->hasMany(Prihlasky::class, 'za_id', 'za_id');
    }
    public function zavody_kategorie()
    {
        return $this->hasMany(Zavody_kategorie::class, 'za_id', 'za_id');
    }

}
