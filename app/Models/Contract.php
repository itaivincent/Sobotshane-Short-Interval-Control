<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    
    protected $fillable = [

        'number',
        'serviceProvider',
        'client',
        'clientTwo',
        'activity',
        'duration',
        'forecastMonthlyVolume',
        'forecastWeeklyVolume',
        'forecastDailyVolume',
        'requiredMonthlyDistance',
        'requiredMonthlyVolume',
        'requiredMonthlyQuantity',
        'forecastWeeklyVolumes',
        'forecastDailyVolumes',
        'commodity',
        'RouteType',
        'RouteId',
        'rate',
        'date',
        'formula',
        'contractValue',
        'price',
        'createdBy',
        'updatedBy',
       
    ];
}
