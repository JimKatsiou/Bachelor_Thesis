<?php

namespace App\Http\data_access\data_base_models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable

{
    use Notifiable;

    protected $fillable = [
        'id', 'name', 'surname', 'email', 'password', 'remember_token', 'role', 'language', 'am'
    ];


    //Table Name
    protected $table = 'users';
    //Primary Key
    protected $primaryKey = 'id';

    public $id;
    public $name;
    public $surname;
    public $role;
    public $email;
    public $password;
    public $am;
    public $language;
    public $remember_token;
    //Timestamps
    public $timestamps = true;


    public function asArray(): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'role' => $this->role,
            'email' => $this->email,
            'password' => $this->password,
            'am' => $this->am,
            'language' => $this->language,
            'remember_token' => $this->remember_token,
        ];
    }

    public function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->surname = $data['surname'] ?? '';
        $this->role = $data['role'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
        $this->am = $data['am'] ?? '';
        $this->language = $data['language'] ?? '';
        $this->remember_token = $data['remember_token'] ?? '';
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datatime',
    ];

    public function lessons()
    {
        $models = array();
        $arr = $this->belongsToMany(Lesson::class, 'teaches')->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $u = new Lesson();
            $u->init($arr[$i]);
            array_push($models, $u);
        }
        return $models;
    }

    public function participations()
    {
        $models = array();
        $arr = $this->hasMany(Participation::class, "user_id", "id")->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $p = new Participation();
            return $p->init($arr[$i]);
            array_push($models, $p);
        }
        return $models;
    }

//    public function roles(){
//        return $this->belongsToMany('App\Role');
//    }
//
//    //mikres vohthitikes functions pou vohthane na valoume role ston user kai an exei rolo
//    public function hasAnyRoles($roles){
//        return null !== $this->roles()->whereIn('name' , $roles)->first();
//    }
//
//    public function hasAnyRole($role){
//        return null !== $this->roles()->where('name' , $role)->first();
//    }

}
