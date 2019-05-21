<?php

namespace App;



use Spatie\Permission\Traits\HasRoles;
use RomegaDigital\Multitenancy\Traits\HasTenants;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasTenants, HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function roles(){
        return $this->belongsTo('\App\Role','role_id');
    }

    public function upload()
    {
        return $this->hasMany(upload::class);
    }


    public function fileInfo()
    {
        return $this->belongsTo(upload::class,'media_id');
    }


}
