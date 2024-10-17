<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'ClienteID');
    }
}
