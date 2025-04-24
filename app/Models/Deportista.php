<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    protected $table = 'deportistas';
    protected $primaryKey = 'idDeportista';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'deporte',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
    public function habitosAlimenticios()
    {
        return $this->hasOne(HabitosAlimenticios::class, 'idDeportista');
    }
}
