<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files_medias extends Model
{
    //
    protected $guarded = [];
    public function fileInfo()
    {
        return $this->belongsTo(upload::class,'media_id');
    }

    public function fileRelation()
    {
        return $this->hasMany(File::class);
    }
}
