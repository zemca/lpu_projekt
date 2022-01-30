<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutez_odpovedi extends Model
{
    protected $table = 'soutez_odpovedi';

    protected $primaryKey = 'sod_id';

    public $timestamps = false;

    protected $guarded = [
        'sod_id'
    ];

    protected $fillable = [
        'sot_id',
        'uz_id',
        'sod_odp',
        'sod_zisk',
        'sod_datum',
        'sod_ipadr',
        'sod_host',
        'sod_tema',
    ];

    // tabulka závisí na
    public function soutez_otazky()
    {
        return $this->belongsTo(Soutez_otazky::class, 'sot_id', 'sot_id');
    }
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
