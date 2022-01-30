<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zebricek extends Model
{
    protected $table = 'zebricek';

    protected $primaryKey = 'ze_id';

    public $timestamps = false;

    protected $guarded = [
        'ze_id'
    ];

    protected $fillable = [
        'ze_nazev',
        'ze_typ',
        'ze_datum',
        'ze_status',
    ];

    // tabulka závisí na

    // tabulky závislé na této tabulce
    public function zebprihl()
    {
        return $this->hasMany(Zebprihl::class, 'ze_id', 'ze_id');
    }

}
