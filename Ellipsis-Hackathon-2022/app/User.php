<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Hashidable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'banned', 'last_login'
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_login',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false);
    }

    public function allRoles()
    {
        return $this->roles->map->name;
    }

    public function isAdmin()
    {
        return $this->allRoles()->contains('superAdmin');
    }

    public function isManager()
    {
        return $this->allRoles()->contains('manager');
    }

    public function isRm()
    {
        return $this->allRoles()->contains('rm');
    }


    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function approver()
    {
        return $this->hasOne(Approver::class);
    }

    public function isApprover()
    {
        return $this->approver()->exists();
    }
}
