<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files_atributies extends Model
{
    //
    public function getDataInfo()
    {
        return $this->belongsTo(Data::class,'data_id');
    }
}
