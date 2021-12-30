<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzivatel extends Model
{
    protected $table = 'uzivatele';

    protected $primaryKey = 'uz_id';

    public $timestamps = false;

    protected $fillable = [
        '',
    ];
}
