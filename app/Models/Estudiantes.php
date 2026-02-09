<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    
    protected $table = 'student';

    protected $primaryKey = 'id';

    public $incrementing = true;  
    
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'correo',
        'edad',
        'telefono',
        'lenguaje',
    ];
}
