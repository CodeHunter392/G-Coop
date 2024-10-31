<?php

namespace App\Models;

use App\Models\Cooperative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
    ];

    public function cooperatives()
    {
        return $this->hasMany(Cooperative::class);
    }
}
