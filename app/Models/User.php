<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
		'name' => 'required',
		'email' => 'required',
        'password' => ['required', 'string', 'min:8'],
		'rol_id' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'address' => '',
		'telephone' => '',
		'provider_id' => '',
    ];

    protected $perPage = 20;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'image',
        'address',
        'telephone',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\Models\Provider', 'id', 'provider_id');
    }
    public function rol()
    {
        return $this->hasOne('App\Models\Rol', 'id', 'rol_id');
    }
}
