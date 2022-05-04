<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    //public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'categoryName',
        'categoryColor',
        'categoryStartTime',
        'categoryEndTime',

        'order',
        'user_id',
        'timetable_id',

    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function timetables()
    {
        return $this->belongsTo(Timetable::class);
    }
}
