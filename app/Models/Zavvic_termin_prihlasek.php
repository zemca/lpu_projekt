<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zavvic_termin_prihlasek extends Model
{
    protected $table = 'zavvic_termin_prihlasek';

    protected $primaryKey = 'za_kat_id';

    public $timestamps = false;

    protected $guarded = [
        'za_kat_id'
    ];

    protected $fillable = [
        'za_id',
        'za_terminprihl',
        'vklad',
        'za_kateg',
    ];

    // tabulka závisí na
    public function zavvic()
    {
        return $this->belongsTo(Zavvic::class, 'za_id', 'za_id');
    }

    // tabulky závislé na této tabulce

}
