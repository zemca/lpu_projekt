<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vklady extends Model
{
    protected $table = 'vklady';

    protected $primaryKey = 'vk_id';

    public $timestamps = false;

    protected $guarded = [
        'vk_id'
    ];

    protected $fillable = [
        'uz_id',
        'vk_status',
        'vk_castka',
        'vk_termin',
        'vk_poznamka',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'uz_id', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
