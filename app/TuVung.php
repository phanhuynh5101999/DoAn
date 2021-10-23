<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuVung extends Model
{
    Protected $table = 'tuvung';
    public $timestamps = false;
    public function chude()
    {
        return $this->belongsTo('App\ChuDe', 'idchude', 'id');
    }
}
