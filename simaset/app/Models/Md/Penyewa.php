<?php

namespace App\Models\Md;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'tbl_penyewa';

    public function asset(){
        return $this->hasOne('App\Models\Md\Asset', 'id_asset', 'id');
    }
}
