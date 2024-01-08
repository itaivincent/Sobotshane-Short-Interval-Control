<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plandrivers extends Model
{
    use HasFactory;
    protected $fillable = [

        'contractplanId',
        'routeplanId',
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
        'statusReason',
        'createdBy',
        'updatedBy',
       
    ];
}
