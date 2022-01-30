<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'ad_id';

    public $timestamps = false;

    protected $guarded = [
        'ad_id'
    ];

    protected $fillable = [
        'ad_prava',
        'uz_id',
    ];


    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
