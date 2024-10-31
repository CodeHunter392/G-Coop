<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BureauCoop extends Model
{
    use HasFactory;
    protected $fillable = [
        'cooperative_id',
        'date_mandant',
        'date_fin',
        'en_cours',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function membres()
    {
        return $this->hasMany(MembreBureau::class,'bureau_id');
    }
}
