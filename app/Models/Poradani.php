<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poradani extends Model
{
    protected $table = 'poradani';

    protected $primaryKey = 'po_id';

    public $timestamps = false;

    protected $guarded = [
        'po_id'
    ];

    protected $fillable = [
        'uz_id',
        'po_znak',
        'po_poznamka',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
