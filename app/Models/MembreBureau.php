<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreBureau extends Model
{
    use HasFactory;
    protected $fillable = [
        'bureau_id',
        'nom',
        'poste',
        'tel',
        'user_id',
    ];

    public function bureau()
    {
        return $this->belongsTo(BureauCoop::class);
    }
}
