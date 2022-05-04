<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function userData() {
    //     return $this->hasMany(UserData::class);
    // }

    // public function budgets() {
    //     return $this->morphToMany(Budget::class, 'entry', 'user_data', 'entry_id', 'entry_type');
    // }

    // TODO - refactor column to user_id
    public function budgets()
    {
        return $this->hasMany(Budget::class , 'user_id');
    }


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function events()
    {
        return $this->morphToMany(Event::class , 'entry', 'user_data');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class)->orderBy('order');
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class)->orderBy('order');
    }

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
}
