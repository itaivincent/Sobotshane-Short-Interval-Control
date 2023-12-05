<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'surname',
        'group',  
        'dob',
        'gender',
        'phoneNumber',
        'routeType',
        'licenseNumber',
        'resourcePoolStatus',
        'vehicleType',
        'availability',
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
