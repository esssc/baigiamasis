<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users(){
         return $this->belongstomany('App\User', 'groups_users');
    }

    public function courses (){
        return $this->belongsTo('App\Course');
    }
    public function lectures (){
        return $this->hasmany('App\Lectures');
    }


}
