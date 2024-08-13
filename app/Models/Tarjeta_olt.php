<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta_olt extends Model
{
    protected $table="tarjeta_olt";
    protected $primaryKey="idtarjeta_olt";
    public $timestamps=false;

    protected $fillable=[
        'idolt',	
        'nombre_tarjeta',	
        'numero_slot',	
        'cantidad_puerto'	

    ];
}
