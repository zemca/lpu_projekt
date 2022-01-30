<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akce_prihlaska extends Model
{
    protected $table = 'akce_prihlaska';

    protected $primaryKey = 'pr_id';

    public $timestamps = false;

    protected $guarded = [
        'pr_id'
    ];

    protected $fillable = [
        'akce_prihlaska',
        'ak_id',
        'pr_kategorie',
        'pr_poznamka',
        'pr_datum_prihlaseni',
        'pr_ucast',
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
