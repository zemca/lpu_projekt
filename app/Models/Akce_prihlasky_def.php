<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akce_prihlasky_def extends Model
{
    protected $table = 'akce_prihlasky_def';

    protected $primaryKey = 'apd_id';

    public $timestamps = false;

    protected $guarded = [
        'apd_id'
    ];

    protected $fillable = [
        'ak_id',
        'apd_konec_prihlasek',
        'apd_kategorie',
    ];

    // tabulka závisí na
    public function akce()
    {
        return $this->belongsTo(Akce::class, 'ak_spravce', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
