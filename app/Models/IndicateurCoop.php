<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicateurCoop extends Model
{
    use HasFactory;
    protected $fillable = [
        'coop_id',
        'date_releve',
        'indic_sociaux',
        'valeur',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
