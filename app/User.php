<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MyResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name','username','email','country','phone', 'password','status','specialty','resume'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function favorite_posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopeAuthors($query)
    {
        return $query->where('role_id',2);
    }

    public function scopeFreelancers($query)
    {
        return $query->where('role_id',3);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
}
