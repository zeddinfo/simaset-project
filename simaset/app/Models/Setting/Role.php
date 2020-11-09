<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function menu(){
        return $this->hasMany('App\Models\Setting\MenuDetail', 'id_role', 'id');
    }

    public function namaRole(){
        return $this->hasOne('App\Models\Setting\Role', 'id', 'role');
    }
}
