<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table = 'menu_detail';

    public function detailMenu(){
        return $this->hasOne('App\Models\Setting\Menu', 'id', 'id_menu');
    }
}
