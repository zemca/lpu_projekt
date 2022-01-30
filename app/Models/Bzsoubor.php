<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bzsoubor extends Model
{
    protected $table = 'bzsoubor';

    protected $primaryKey = 'bzs_id';

    public $timestamps = false;

    protected $guarded = [
        'bzs_id'
    ];

    protected $fillable = [
        'bz_id',
        'bzs_poradi',
        'bzs_cesta',
        'bzs_popis',
        'bzs_status',
    ];

    // tabulka závisí na
    public function bazar()
    {
        return $this->belongsTo(Bazar::class, 'bz_id', 'bz_id');
    }

    // tabulky závislé na této tabulce

}
