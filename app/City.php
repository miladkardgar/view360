<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $guarded=[];
    public function file(){
        return $this->hasMany(File::class);
    }
}
