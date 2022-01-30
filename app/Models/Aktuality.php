<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktuality extends Model
{
    protected $table = 'aktuality';

    protected $primaryKey = 'ak_id';

    public $timestamps = false;

    protected $guarded = [
        'ak_id'
    ];

    protected $fillable = [
        'ak_nadpis',
        'ak_znak',
        'ak_text',
    ];

    // tabulka závisí na

    // tabulky závislé na této tabulce

}
