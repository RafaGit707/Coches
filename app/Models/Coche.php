<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'precio', 'ano'];
    
    public function scopePrecioMenorQue($query, $precio)
    {
        return $query->where('precio', '<', $precio);
    }

    public function scopeAnoMayorQue($query, $ano)
    {
        return $query->where('ano', '>', $ano);
    }
}
