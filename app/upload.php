<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    //
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function files(){
        return $this->hasOne(Files_medias::class);
    }
}
