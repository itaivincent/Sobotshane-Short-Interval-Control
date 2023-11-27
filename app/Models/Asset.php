<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;


    protected $fillable = [

        'make',
        'registration',
        'assetDescription',
        'vinNumber',
        'assetType',
        'weight',
        'tonnage',
        'driverId',
        'statusReason',
        'routeId',
        'licenseNumber',
        'payloadCapacity',
        'status',
        'mileage',
        'fueltype',
        'model',
        'registrationYear',
        'engineCapacity',
        'expectedFuelConsumption',
        'truckType',
        'trailerType',
        'registrationExpireDate',
        'createdBy',
        'updatedBy',

       
    ];
}
