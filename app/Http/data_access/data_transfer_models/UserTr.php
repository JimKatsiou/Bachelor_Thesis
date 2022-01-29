<?php

namespace App\data_access\data_transfer_models;

use Illuminate\Support\Facades\Auth;
use Maksi\LaravelRequestMapper\Filling\RequestData\JsonRequestData;

class UserTr extends JsonRequestData

{

    public $id;
    public $name;
    public $surname;
    public $role;
    public $email;
    public $password;
    public $am;
    public $language;
    public $remember_token;



    protected function init(array $data): void
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
}
