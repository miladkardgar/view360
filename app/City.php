<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function file(){
        return $this->hasMany(File::class);
    }
}
