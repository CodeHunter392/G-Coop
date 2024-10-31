<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicateurSociaux extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'type',
    ];

    public function cooperatives()
    {
        return $this->hasMany(IndicateurCoop::class);
    }
}
