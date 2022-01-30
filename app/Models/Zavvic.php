<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zavvic extends Model
{
    protected $table = 'zavvic';

    protected $primaryKey = 'za_id';

    public $timestamps = false;

    protected $guarded = [
        'za_id'
    ];

    protected $fillable = [
        'za_id',
        'za_status',
        'za_oris',
        'za_nazev',
        'za_misto',
        'za_termintext',
        'za_terminzac',
        'za_terminzac_cas',
        'za_konec_datum',
        'za_konec_cas',
        'za_oddil',
        'za_ubytpopis',
        'za_ubyt',
        'za_ubytvklad',
        'za_dopravapopis',
        'za_doprava',
        'za_dopravavklad',
        'za_program1popis',
        'za_program1',
        'za_program1vklad',
        'za_program2popis',
        'za_program2',
        'za_program2vklad',
        'za_web',
        'za_poznamka',
        'za_platba',
        'za_terminprihl',
        'za_vedouci',
        'za_vysledky',
        'za_zebricek',
        'za_mail_posledni',
        'za_typ_kateg',
        'za_zkratka',
    ];

    // tabulka závisí na

    // tabulky závislé na této tabulce
    public function prihlaskyvic()
    {
        return $this->hasMany(Prihlaskyvic::class, 'za_id', 'za_id');
    }
    public function termin_zavvic()
    {
        return $this->hasMany(Termin_zavvic::class, 'za_id', 'za_id');
    }
    public function zavvic_termin_prihlasek()
    {
        return $this->hasMany(Zavvic_termin_prihlasek::class, 'za_id', 'za_id');
    }

}
