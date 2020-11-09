<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function sub_menu2(){
        return $this->hasMany('App\Models\Setting\Menu', 'parent', 'id')->orderBy('sort_by');
    }
}
