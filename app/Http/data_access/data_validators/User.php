<?php
namespace App\data_access\data_validators;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

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

    protected $casts = [
        'email_verified_at' => 'datatime' ,
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    //mikres vohthitikes functions pou vohthane na valoume role ston user kai an exei rolo
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name' , $roles)->first();
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->where('name' , $role)->first();
    }


    //TODO add here something to Connect User Status Connect classes

    public function participations()
    {
        return $this->belongsToMany('App\Participation','participation_user');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson','lesson_user');
    }

}
