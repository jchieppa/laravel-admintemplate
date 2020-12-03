<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

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

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    /**
     * Standardize name saved with capitalization
     * @param $input
     */
    public function setNameAttribute($input)
    {
        $names = explode(' ', strtolower($input));
        if(count($names) > 1){
            for($i=0; $i < count($names); $i++){
                $names[$i] = ucfirst($names[$i]);
            }
            $this->attributes['name'] = implode(' ', $names);
        } else {
            $this->attributes['name'] = ucfirst($names[0]);
        }

    }

    /**
     * Standardize email to all lowercase
     * @param $input
     */
    public function setEmailAttribute($input)
    {
        $this->attributes['email'] = strtolower($input);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
