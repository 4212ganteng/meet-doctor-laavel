<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    // use HasFactory;
    use SoftDeletes;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    // tambahinn email verived at karena tble user ada field ny
    protected $dates =[
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    // many 2 many after middleware

    public function role(){
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }
    // end role

     // user hasmany appointment
    // bikin function table yang di tuju
    public function appointment()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\Operational\appointment', 'user_id');
    }


        // appointment hasOne transaction
    // bikin function table yang di tuju
    public function detail_user()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasOne('App\Models\ManagementAccess\DetailUser', 'user_id');
    }

        // appointment hasOne transaction
    // bikin function table yang di tuju
    public function role_user()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'user_id');
    }
}
