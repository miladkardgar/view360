<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $dates = ['deleted_at'];

    public function file(){
        return $this->hasMany(File::class,'transaction_type');
    }
    public function dataAttr()
    {
        return $this->hasMany(Files_atributies::class);
    }

    public function scopeFileTypes($query)
    {
        return $query->where('type','fileType');
    }
    public function scopeTransactionTypes($query)
    {
        return $query->where('type','transactionType');
    }
    public function scopeUsageTypes($query)
    {
        return $query->where('type','usageType');
    }
    public function scopeCityTypes($query)
    {
        return $query->where('type','cityType');
    }
}
