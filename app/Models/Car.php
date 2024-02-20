<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 


class Car extends Model
{
    use HasFactory;
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rents');
    }
}


