<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'date_debut',
        'date_fin',
        'tutelle',
        'montant',
        'statut',
    ];

    public function organismes()
    {
        return $this->belongsToMany(Organisme::class, 'programme_organismes');
    }
    public function tutelleNom(){
        return $this->belongsTo(Organisme::class,'tutelle');
    }

}
