<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{
    use HasFactory;
    protected $fillable = [
        'organisme_id',
        'membre_id',
        'date_adhesion',
        'role',
    ];

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
