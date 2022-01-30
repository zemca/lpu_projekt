<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zavody_kategorie extends Model
{
    protected $table = 'zavody_kategorie';

    protected $primaryKey = 'za_kat_id';

    public $timestamps = false;

    protected $guarded = [
        'za_kat_id'
    ];

    protected $fillable = [
        'za_id',
        'kategorie',
        'vklad'
    ];

    // tabulka závisí na
    public function zavody()
    {
        return $this->belongsTo(Zavody::class, 'za_id', 'za_id');
    }

    // tabulky závislé na této tabulce

}
