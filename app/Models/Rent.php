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
    
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);    
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);    
    }
    #TODO: Update checksum after end_time is written (CRUD)

    // protected $fillable = ['start_time', 'end_time', 'checksum'];

    // public function updateChecksum()
    // {
    //     $this->checksum = 11;
    //     $this->save();

    //     if (!$this->end_time){
    //         return;
    //     }

    //     $car = $this->car;
    //     $user = $this->user;
    

    //     $durationInMinutes = $this->end_time->diffInMinutes($this->start_time);
    //     $durationInMinutes = max(1, round($durationInMinutes / 60));
    

    //     $cost = $durationInMinutes * $car->cost_per_minute * (1 - $user->discount / 100);
    
        
    //     // $this->checksum = $cost;
        
    //     // $this->save();

    // }

    // protected static function boot()
    // {
    // parent::boot();

    // static::updated(function ($rent) {
    //     $this->checksum = 11;
    //     $this->save();
    //     // if ($rent->isDirty('end_time')) {
    //         $rent->updateChecksum();   
    //     // }
    // });
    // }
}
