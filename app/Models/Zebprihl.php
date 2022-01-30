<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zebprihl extends Model
{
    protected $table = 'zebprihl';

    protected $primaryKey = 'zp_id';

    public $timestamps = false;

    protected $guarded = [
        'zp_id'
    ];

    protected $fillable = [
        'uz_id',
        'ze_id',
        'zp_kategorie'
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }
    public function zebricek()
    {
        return $this->belongsTo(Zebricek::class, 'ze_id', 'ze_id');
    }

    // tabulky závislé na této tabulce

}
