<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmakce extends Model
{
    protected $table = 'tmakce';

    protected $primaryKey = 'tm_id';

    public $timestamps = false;

    protected $guarded = [
        'tm_id'
    ];

    protected $fillable = [
        'uz_id',
        'tm_datum',
        'tm_nazev',
        'tm_popis',
        'tm_status',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce
    public function tmsoubor()
    {
        return $this->hasMany(Tmsoubor::class, 'tm_id', 'tm_id');
    }

}
