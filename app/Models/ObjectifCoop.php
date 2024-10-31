<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectifCoop extends Model
{
    use HasFactory;
    protected $fillable = [
        'coop_id',
        'date_releve',
        'objectif_ligne_prg',
        'execution',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
