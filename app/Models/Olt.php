<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olt extends Model
{
   protected $table="olt";
   protected $primaryKey="idolt";
   public $timestamps=false;

   protected $fillable=[
      'nombre',
      'marca',	
      'modelo',
      'numero_slot',	
      'ipconexion',	
      'puerto',	
      'estado'	

   ];
}
