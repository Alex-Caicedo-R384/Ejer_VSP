<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cruce extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'SumaMontos', 'Total'];
}
