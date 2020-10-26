<?php

namespace App\Models\History;

use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    protected $table = 'tbl_log_history';

    public function user(){
        return $this->hasOne('App\Models\Md\User', 'id', 'id_user');
    }
}
