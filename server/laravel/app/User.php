<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    Public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    Public function wines()
    {
        return $this->hasMany(Wine::class);
    }

    Public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Wine::class, 'favorites', 'user_id', 'wine_id')->withTimestamps();
    }

    public function favorite($wineId)
    {
        $exist = $this->is_favorite($wineId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($wineId);
            return true;
        }
    }

    public function unfavorite($wineId)
    {
        $exist = $this->is_favorite($wineId);

        if($exist){
            $this->favorites()->detach($wineId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($wineId)
    {
        return $this->favorites()->where('wine_id',$wineId)->exists();
    }
}
