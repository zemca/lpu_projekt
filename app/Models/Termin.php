<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = 'termin';

    protected $primaryKey = 'te_id';

    public $timestamps = false;

    protected $guarded = [
        'te_id'
    ];

    protected $fillable = [
        'te_datum'
    ];

    // tabulka závisí na

    // tabulky závislé na této tabulce

}
