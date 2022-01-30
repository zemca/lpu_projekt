<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmsoubor extends Model
{
    protected $table = 'tmsoubor';

    protected $primaryKey = 'tms_id';

    public $timestamps = false;

    protected $guarded = [
        'tms_id'
    ];

    protected $fillable = [
        'tm_id',
        'tms_poradi',
        'tms_cesta',
        'tms_popis',
        'tms_status',
    ];

    // tabulka závisí na
    public function tmakce()
    {
        return $this->belongsTo(Tmakce::class, 'tm_id', 'tm_id');
    }

    // tabulky závislé na této tabulce

}
