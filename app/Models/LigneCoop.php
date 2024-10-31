<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCoop extends Model
{
    use HasFactory;
    protected $fillable = [
        'coop_id',
        'sub_demander',
        'sub_accorder',
        'date_accord',
        'coop_id',
        'ligne_prg_id',
    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function ligneProgramme()
    {
        return $this->belongsTo(LigneProgramme::class);
    }
}
