<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    protected $table = 'entrenadores';
    protected $primaryKey = 'idEntrenador';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'especialidad',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}