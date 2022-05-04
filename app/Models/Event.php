<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\Scheduling\Schedule;

class Event extends Model
{

    //public $timestamps = false;

    use HasFactory;

    protected $fillable = [

        'eventTitle',
        'user_id',
        'description',
        'presetCategory',
        'color',
        'eventStartTime',
        'eventEndTime'

    ];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class);
    }
}
