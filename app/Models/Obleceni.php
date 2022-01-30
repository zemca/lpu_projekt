<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obleceni extends Model
{
    protected $table = 'obleceni';

    protected $primaryKey = 'ako_id';

    public $timestamps = false;

    protected $guarded = [
        'ako_id'
    ];

    protected $fillable = [
        'uz_id',
        'ob_typ',
        'ob_velikost',
        'ob_pocet',
        'ob_poznamka',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
