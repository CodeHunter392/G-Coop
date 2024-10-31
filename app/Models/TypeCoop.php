<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCoop extends Model
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
