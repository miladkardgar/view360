<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    //
    protected $fillable = ['data_id', 'transaction_type', 'area', 'rooms', 'bathroom', 'bedroom', 'parking', 'lat', 'lon', 'city_id',
        'region_id', 'usage_id', 'arena', 'building', 'price', 'areaPrice', 'direction', 'unit', 'ownership_document_status', 'floor',
        'countFloor', 'mortgage', 'rent', 'buildingYear', 'description', 'oldArea', 'yearMortgage', 'dayMortgage', 'floorType',
        'commercialType', 'ownerName', 'ownerPhone', 'address', 'user_id', 'status', 'deleted_at', 'created_at', 'updated_at',
        'title', 'city_type_id', 'parent_id', 'province_id'];
}
