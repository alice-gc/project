<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{

    //public $timestamps = false;

    use HasFactory;
    public $timestamps = FALSE;

    protected $fillable = [
        'name',
        'house',
        'food',
        'transport',
        'personal',
        'entertainment',
        'user_id'
    ];

    public function user()
    {
        // TODO - refactor col to user_id
        return $this->belongsTo(User::class , 'user_id');
    }
}
