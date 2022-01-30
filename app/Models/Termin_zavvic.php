<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin_zavvic extends Model
{
    protected $table = 'termin_zavvic';

    protected $primaryKey = 'ter_id';

    public $timestamps = false;

    protected $guarded = [
        'ter_id'
    ];

    protected $fillable = [
        'za_id',
        'ter_tag',
        'ter_datum',
    ];

    // tabulka závisí na
    public function zavvic()
    {
        return $this->belongsTo(Zavvic::class, 'za_id', 'za_id');
    }

    // tabulky závislé na této tabulce

}
