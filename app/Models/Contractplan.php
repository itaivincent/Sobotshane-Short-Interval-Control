<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractplan extends Model
{
    use HasFactory;
   
    protected $fillable = [

        'duration',
        'contract',
        'capacity',
        'month',
        'week',
        'daily',
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
