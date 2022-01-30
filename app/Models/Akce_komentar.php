<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akce_komentar extends Model
{
    protected $table = 'akce_komentar';

    protected $primaryKey = 'ako_id';

    public $timestamps = false;

    protected $guarded = [
        'ako_id'
    ];

    protected $fillable = [
        'uz_id',
        'ak_id',
        'ako_datumcas',
        'ako_text	',
    ];


    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }
    public function akce()
    {
        return $this->belongsTo(Akce::class, 'ak_id', 'ak_id');
    }

    // tabulky závislé na této tabulce
}
