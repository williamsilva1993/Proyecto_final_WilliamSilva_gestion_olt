<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puerto_olt extends Model
{
    protected $table="puerto_olt";
    protected $primaryKey="idpuerto_olt";
    public $timestamps=false;

    protected $fillable=[
        'idtarjeta_olt',
        'nombre_puerto',	
        'numero_puerto',	
        'vlan'	

    ];
}
