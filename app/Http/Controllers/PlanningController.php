<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Routeasset;
use App\Models\Contract;
use App\Models\Driver;
use App\Models\Formula;
use App\Models\Contractasset;
use App\Models\Contractplan;
use App\Models\Capability;
use App\Models\Planassets;
use App\Models\Planroutes;
use App\Models\Plandrivers;
use App\Models\Plancontract;
use App\Models\Assetdriver;
use App\Models\Escalationformula;
use App\Models\Route;
use DB;
use App\Models\Routeratetracker;
use Carbon\Carbon;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

     /**
     * Display a listing of the resource.
     */
    public function contractplan()
    {
        
        $contracts = Contract::all();

        return view('planning.contractplan', compact('contracts'));
    }


    public function showcontractplan($id)
    {
        $user = auth()->user();

        //Monthly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $forecastmonthcapacity = Route::where('contractId', $id)->sum('estimatedmonthQuantity');
        $contractroutes = Routeasset::where('contract', $id)->get();

        $availablemonthcapacity = 0;
        $assets = [];

        //Get monthly current capacity
        foreach($contractroutes as $routes){

            $assetRecord = Asset::where('id', $routes->asset )->where('resourcePoolStatus' , '!=', '1')->first();
            $assets[] = $assetRecord;
            $availablemonthcapacity += $assetRecord->payloadCapacity;
        }

       // dd($assets);

        //compare forecast vs current plan 
        if($availablemonthcapacity > $forecastmonthcapacity){

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Contractplan::create([

                'duration' => 'Month',
                'contract' => $id,
                'capacity' => $forecastmonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planasset::create([

                        'contractplanId',
                        'routeplanId',
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
                        'gearType',
                        'registrationYear',
                        'engineCapacity',
                        'expectedFuelConsumption',
                        'truckType',
                        'trailerType',
                        'resourcePoolStatus',
                        'registrationExpireDate',
                        'createdBy',

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

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

                        ]);

                        
                    $updateasset = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }
             

                }
               
                dd($asset);

            }

            //produce plan to fit the forecastmonthcapacity


            //get all resources that are assigned to contract but still in resource pool

        }else{

            //produce plan for the available capacity 
            $currentCapacity = 0;
            $contractplancreate = Contractplan::create([

                'duration' => 'Month',
                'contract' => $id,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $availablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planasset::create([

                        'contractplanId',
                        'routeplanId',
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
                        'gearType',
                        'registrationYear',
                        'engineCapacity',
                        'expectedFuelConsumption',
                        'truckType',
                        'trailerType',
                        'resourcePoolStatus',
                        'registrationExpireDate',
                        'createdBy',

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

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

                        ]);

                        
                    $updateasset = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        
            
          //search out for additional resources 
           $neededadditionalcapacity = $forecastmonthcapacity - $currentCapacity;

         foreach($contractroutes as $routes){

            $assetRecord = Asset::where('id', $routes->asset )->where('resourcePoolStatus' , '!=', '1')->first();
            $assets[] = $assetRecord;
            $availablemonthcapacity += $assetRecord->payloadCapacity;
        }

        
        }



        //output final plan 
    

        return view('planning.showmonthlycontractplan', compact('contracts'));
    }


    public function routeplan()
    {
        
        $routes = Route::all();

        return view('planning.routeplan', compact('routes'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
