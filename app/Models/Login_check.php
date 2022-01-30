<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login_check extends Model
{
    protected $table = 'login_check';

    protected $primaryKey = 'lc_id';

    public $timestamps = false;

    protected $guarded = [
        'lc_id'
    ];

    protected $fillable = [
        'lc_uzid',
        'lc_string',
        'lc_type',
    ];

    // tabulka závisí na
    public function uzivatel()
    {
        return $this->belongsTo(Uzivatel::class, 'lc_uzid', 'uz_id');
    }

    // tabulky závislé na této tabulce

}
