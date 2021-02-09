<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['fechaInicio','fechaFin', 'tipoid','cliente_id'];

}
