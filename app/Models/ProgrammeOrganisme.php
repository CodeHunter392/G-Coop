<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeOrganisme extends Model
{
    use HasFactory;
    protected $fillable = [
        'programme_id',
        'organisme_id',
        'montant_organisme',
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }
}
