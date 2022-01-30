<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chattr extends Model
{
    protected $table = 'chattr';

    protected $primaryKey = 'tr_id';

    public $timestamps = false;

    protected $guarded = [
        'tr_id'
    ];

    protected $fillable = [
        'tr_datum',
        'tr_odkaz',
        'tr_podpis',
        'tr_text',
        'tr_autor',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'tr_autor', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
