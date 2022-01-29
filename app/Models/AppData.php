<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppData extends Model
{
    protected $table = 'app_data';

    public function application() {
        return $this->belongsTo(Application::class, 'user_id');
    }
}
