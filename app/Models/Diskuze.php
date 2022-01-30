<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskuze extends Model
{
    protected $table = 'diskuze';

    protected $primaryKey = 'di_id';

    public $timestamps = false;

    protected $guarded = [
        'di_id'
    ];

    protected $fillable = [
        'di_datum',
        'di_nazev',
        'di_podpis',
        'di_text',
        'di_autor',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'di_autor', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
