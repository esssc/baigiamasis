<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    public function groups (){
        return $this->belongsTo('App\Group');
    }

    public function files(){
        return $this->hasMany('App\File', 'lecture_id');
    }
}
