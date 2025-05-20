<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaContacto extends Model
{
    use HasFactory;

    protected $table = 'agendacontactos';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'notas'
    ];
}
