<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = [
        'hour_number',
        'slot',
        'user_id',
        'timetable_id',
        'color'
    ];

    public function timetables()
    {
        return $this->belongsTo(Timetable::class);
    }
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
