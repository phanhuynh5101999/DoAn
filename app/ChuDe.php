<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    Protected $table = 'chude';
    public $timestamps = false;
    public function tuvung()
    {
        return $this->hasMany('App\TuVung', 'idchude', 'id');
    }
    
}
