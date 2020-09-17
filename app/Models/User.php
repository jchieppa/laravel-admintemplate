<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

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
        'first_name', 'last_name', 'email', 'password',
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
     * Standardize first saved with capitalization.
     * @param $input
     */
    public function setFirstNameAttribute($input)
    {
        $this->attributes['first_name'] = ucfirst($input);
    }

    /**
     * Standardize last name saved with capitalization.
     * @param $input
     */
    public function setLastNameAttribute($input)
    {
        $this->attributes['last_name'] = ucfirst($input);
    }

    /**
     * Helper Method to return concatinated name
     * @return string
     */
    public function getNameAttribute()
    {
        return trim(sprintf('%s %s', $this->first_name, $this->last_name));
    }

    /**
     * Accessor to convert created_at from db stored UTC to APP_TIMEZONE.
     *
     * @param $value
     * @return Carbon
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone(env('APP_TIMEZONE'));
    }

    /**
     * Accessor to convert updated_at from db stored UTC to APP_TIMEZONE.
     *
     * @param $value
     * @return Carbon
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone(env('APP_TIMEZONE'));
    }

    /**
     * Hash password.
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

//    /**
//     * Standardize name saved with capitalization.
//     * @param $input
//     */
//    public function setNameAttribute($input)
//    {
//        $names = explode(' ', strtolower($input));
//        if (count($names) > 1) {
//            for ($i = 0; $i < count($names); $i++) {
//                $names[$i] = ucfirst($names[$i]);
//            }
//            $this->attributes['name'] = implode(' ', $names);
//        } else {
//            $this->attributes['name'] = ucfirst($names[0]);
//        }
//    }

    /**
     * Standardize email to all lowercase.
     * @param $input
     */
    public function setEmailAttribute($input)
    {
        $this->attributes['email'] = strtolower($input);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
