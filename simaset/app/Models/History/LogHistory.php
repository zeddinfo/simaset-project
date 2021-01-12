<?php

namespace App\Models\History;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    protected $table = 'tbl_log_history';

    public function user(){
        return $this->hasMany('App\Models\Md\User', 'id', 'id_user','username');
    }
    public function asset(){
        return $this->hasOne('App\Models\Md\Asset', 'id', 'id_asset');
    }
}
