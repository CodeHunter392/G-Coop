<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $fillable = [
        'organisme_id',
        'type',
        'montant',
        'date_transaction',
        'description',
    ];

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }
}
