<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prihlaskyvic extends Model
{
    protected $table = 'prihlaskyvic';

    protected $primaryKey = 'pr_id';

    public $timestamps = false;

    protected $guarded = [
        'pr_id'
    ];

    protected $fillable = [
        'uz_id',
        'za_id',
        'pr_kategorie',
        'pr_ubytovani',
        'pr_doprava',
        'pr_program1',
        'pr_program2',
        'pr_poznamka',
        'pr_datum',
        'pr_prijmeni',
        'pr_datumprihl',
        'pr_terminprihl',
        'pr_potvrzeni',
        'pr_vzkaz',
        'pr_vklad',
        'pr_datum_admin',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }
    public function zavvic()
    {
        return $this->belongsTo(Zavvic::class, 'za_id', 'za_id');
    }

    // tabulky závislé na této tabulce

}
