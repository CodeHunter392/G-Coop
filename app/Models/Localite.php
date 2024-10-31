<?php

namespace App\Models;


use App\Models\NiveauLocalite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localite extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'id_parent',
        'niveau_id',
    ];



    public function niveau()
    {
        return $this->belongsTo(NiveauLocalite::class);
    }
}
