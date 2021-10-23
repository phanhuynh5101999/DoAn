<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocLai extends Model
{
    Protected $table = 'hoclai';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User', 'iduser', 'id');
    }
    public function tuvung()
    {
        return $this->hasOne('App\TuVung', 'idtuvung', 'id');
    }
}
