<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prihlasky extends Model
{
    protected $table = 'prihlasky';

    protected $primaryKey = 'pr_id';

    public $timestamps = false;

    protected $guarded = [
        'pr_id'
    ];

    protected $fillable = [
        'uz_id',
        'za_id',
        'pr_kategorie',
        'pr_naklady',
        'pr_doprava',
        'pr_ubytovani',
        'pr_datum',
        'pr_prijmeni',
        'pr_poznamka',
        'pr_ucast',
        'pr_datum_prihlaseni',
        'pr_datum_admin',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }
    public function zavody()
    {
        return $this->belongsTo(Zavody::class, 'za_id', 'za_id');
    }

    // tabulky závislé na této tabulce

}
