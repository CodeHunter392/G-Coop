<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectifLigneProgramme extends Model
{
    use HasFactory;
    protected $fillable = [
        'programme_id',
        'ligne_programme_id',
        'echeance',
        'objectif_id',
    ];

    public function ligneProgramme()
    {
        return $this->belongsTo(LigneProgramme::class);
    }
    public function objectifs()
    {
        return $this->hasMany(Objectif::class);
    }
    public function nameObjectif($id){
        $objectif = Objectif::find($id);
        return "$objectif->nom";
    }
}
