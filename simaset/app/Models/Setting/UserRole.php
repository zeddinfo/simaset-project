<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role';

    public function namaUser(){
        return $this->hasOne('App\Models\Md\User', 'id', 'id_user');
    }

    public function namaRole(){
        return $this->hasOne('App\Models\Setting\Role', 'id', 'id_role');
    }
}
