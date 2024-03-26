<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;   
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'car_id', 'user_id', 'id'];

    public $timestamps = false;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);    
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);    
    }

    
}
