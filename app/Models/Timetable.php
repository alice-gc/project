<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'order'
    ];

    public $timestamps = false;

    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }




}
