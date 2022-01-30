<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    protected $table = 'bazar';

    protected $primaryKey = 'bz_id';

    public $timestamps = false;

    protected $guarded = [
        'bz_id'
    ];

    protected $fillable = [
        'uz_id',
        'bz_bzdopr',
        'bz_doprdatum',
        'bz_doprpocet',
        'bz_typ',
        'bz_rodic',
        'bz_datum',
        'bz_nadpis',
        'bz_popis',
        'bz_odkaz',
        'bz_status',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce
    public function bzsoubor()
    {
        return $this->hasMany(Bzsoubor::class, 'bz_id', 'bz_id');
    }
}
