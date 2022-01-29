<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'application';

    public function app_data(){
        return $this->hasMany(AppData::class, 'user_id');
    }
}
