<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutez_otazky extends Model
{
    protected $table = 'soutez_otazky';

    protected $primaryKey = 'sot_id';

    public $timestamps = false;

    protected $guarded = [
        'sot_id'
    ];

    protected $fillable = [
        'sot_start',
        'sot_end',
        'sot_textot',
        'sot_odpa',
        'sot_odpb',
        'sot_odpc',
        'sot_odpd',
        'sot_odpe',
        'sot_odpf',
        'sot_odpg',
        'sot_odph',
        'sot_sprodp',
        'sot_autor',
        'sot_status',
        'sot_tema',
        'sot_typ',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'sot_autor', 'uz_id');
    }

    // tabulky závislé na této tabulce
    public function soutez_odpovedi()
    {
        return $this->hasMany(Soutez_odpovedi::class, 'sot_id', 'sot_id');
    }

}
