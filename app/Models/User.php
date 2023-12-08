<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $attributes = ['avatar_url', 'cover_url'];
    // protected $appends = ['avatar_url', 'cover_url'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'user_type',
        'mls_id',
        'phone',
        'website',
        'description',
        'search_preferences',
        'language',
        'country_id',
        'state_id',
        'address1',
        'address2',
        'city_id',
        'zip',
        'avatar',
        'cover_photo',
        'is_approved',
        'is_deleted',
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

    public function getAvatarUrlAttribute()
    {
        return url('images/avatar/'.$this->avatar);
    }

    public function getCoverUrlAttribute()
    {
        return url('images/cover/'.$this->cover_photo);
    }
}
