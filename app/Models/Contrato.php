<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = ['ClienteID', 'Nombre', 'Monto', 'Fecha'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ClienteID');
    }
}
