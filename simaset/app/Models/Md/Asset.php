<?php

namespace App\Models\Md;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'tbl_asset';

    public function perizinan(){
        return $this->hasMany('App\Models\Md\Perizinan', 'id_asset', 'id');
    }

    public function dokumentasi(){
        return $this->hasMany('App\Models\Md\Dokumentasi', 'id_asset', 'id');
    }

    public function penyewa(){
        return $this->hasMany('App\Models\Md\Penyewa', 'id_asset', 'id');
    }
}
