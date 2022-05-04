<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'day',
        'time'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
