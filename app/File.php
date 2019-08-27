<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $guarded = [];

    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id');
    }

    public function transactionType()
    {
        return $this->belongsTo(Data::class, 'transaction_type');
    }
    public function transactionTypeShow()
    {
        return $this->belongsTo(Data::class, 'transaction_type');
    }

    public function ownershipDocumentStatus()
    {
        return $this->belongsTo(Data::class, 'ownership_document_status');
    }

    public function usage()
    {
        return $this->belongsTo(Data::class, 'usage_id');
    }

    public function getCommercialType()
    {
        return $this->belongsTo(Data::class, 'commercialType');
    }

    public function getCityType()
    {
        return $this->belongsTo(Data::class, 'city_type_id');
    }


    public function region()
    {
        return $this->belongsTo(Data::class, 'region_id');
    }

    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getRegion()
    {
        return $this->belongsTo(City::class, 'region_id');
    }

    public function fileMedia()
    {
        return $this->belongsTo(Files_medias::class, 'file_id');
    }

    function getChildInfo()
    {
        return $this->hasOne(File::class, 'id');
    }
}
