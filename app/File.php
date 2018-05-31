<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function lecturesFiles(){
        return $this->belongsTo('App\Lectures');
    }
}
