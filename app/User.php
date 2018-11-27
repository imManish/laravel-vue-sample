<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'full_name', 'role_id', 'gender', 'is_admin', 'is_active', 'is_verified', 'mobile_number', 'vehicle_type', 'email_verified_at', 'remember_token',
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
     * @method roles
     *
     * @return belongsTo
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @method OTP
     *
     * @return relation hasMany
     */
    public function otp()
    {
        return $this->hasMany(Otp::class);
    }

    /**
     * @method BusinessDetails
     *
     * @return belongsTo Belongsto BusinessDetails
     */
    public function businessDetails()
    {
        return $this->belongsTo(BusinessDetail::class);
    }
}
