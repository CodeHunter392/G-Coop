<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauLocalite extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'niveau',
    ];

    public function localites()
    {
        return $this->hasMany(Localite::class);
    }
}
