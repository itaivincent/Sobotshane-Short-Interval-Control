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
use App\Models\Routeplan;
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
            
            $assetRecord = Asset::where('id', '=', $routes->asset)->where('resourcePoolStatus' , '=', null)->first();
         //   dd($assetRecord);

            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;

            }else{

                return back()->with('error', 'There are no resource to use, adjust your assigments for this Contract'); 
            }
          
           
        }

       // dd($assets);

        //compare forecast vs current plan 
        if($availablemonthcapacity > $forecastmonthcapacity){

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Contractplan::create([

                'duration' => 1,
                'contract' => $id,
                'capacity' => $forecastmonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,
                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
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

                'duration' => 1,
                'contract' => $id,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $availablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make,
                        'assetId'     => $asset->id,  
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updateasset = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        
            

          //search out for additional resources 
           $neededadditionalcapacity = $forecastmonthcapacity - $currentCapacity;
         $newavailablemonthcapacity = 0;
         $newassets = [];

         foreach($contractroutes as $routes){

            $assetRecord = Asset::where('id', '=', $routes->asset )->where('resourcePoolStatus' , '=', null)->first();
           // dd($assetRecord);
           if($assetRecord != null){

            $newassets[] = $assetRecord;
            $newavailablemonthcapacity += $assetRecord->payloadCapacity;
            $checkrecords = 1;
           }else{
            $checkrecords = 0;
           }

        }

        if($checkrecords == 1){
     
        if($newavailablemonthcapacity > 0){
     
            //adding additional resource pool assets and drivers to the plan
            foreach($newassets as $asset){

                if($neededadditionalcapacity <= $newavailablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        

        }
        }

        }

        dd('zvaita....');



        //output final plan 
    

        return view('planning.showmonthlycontractplan', compact('contracts'));
    }


    public function routeplan()
    {
        
        $routes = Route::all();

        return view('planning.routeplan', compact('routes'));
    }





    public function showrouteplan($id)
    {
      //  dd($id);
        $user = auth()->user();

        //Monthly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        $contractroutes = Routeasset::where('route', $id)->get();

        $availablemonthcapacity = 0;
        $assets = [];

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
            $assetRecord = Asset::where('id', '=', $routes->asset)->where('routeresourcePoolStatus' , '=', null)->first();
         //   dd($assetRecord);

            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;

            }else{
                
                return back()->with('error', 'There are no resource to use, adjust your assigments for this Route'); 
            }
          
           
        }

       // dd($assets);

        //compare forecast vs current plan 
        if($availablemonthcapacity > $forecastmonthcapacity){

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Routeplan::create([

                'duration' => 1,
                'route' => $id,
                'capacity' => $forecastmonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'routeplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'routeplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,
                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
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
            $contractplancreate = Routeplan::create([

                'duration' => 1,
                'route' => $id,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $availablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'routeplanId' => $contractplancreate->id,
                        'make'     => $asset->make,
                        'assetId'     => $asset->id,  
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'routeplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updateasset = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        
            

          //search out for additional resources 
           $neededadditionalcapacity = $forecastmonthcapacity - $currentCapacity;
         $newavailablemonthcapacity = 0;
         $newassets = [];

         foreach($contractroutes as $routes){

            $assetRecord = Asset::where('id', '=', $routes->asset )->where('routeresourcePoolStatus' , '=', null)->first();
           // dd($assetRecord);
           if($assetRecord != null){

            $newassets[] = $assetRecord;
            $newavailablemonthcapacity += $assetRecord->payloadCapacity;
            $checkrecords = 1;
           }else{
            $checkrecords = 0;
           }

        }

        if($checkrecords == 1){
     
        if($newavailablemonthcapacity > 0){
     
            //adding additional resource pool assets and drivers to the plan
            foreach($newassets as $asset){

                if($neededadditionalcapacity <= $newavailablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'routeplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'routeplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        

        }
        }

        }

        dd('zvaita....');



        //output final plan 
    

        return view('planning.showmonthlyrouteplan', compact('contracts'));
    }


    public function showrouteplanweekly($id)
    {
        //dd($id);
        $user = auth()->user();

        $routeplanId = Routeplan::where('route','=', $id)->latest()->first();
       // dd($routeplanId->id);
        //Weekly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        $forecastmonthcapacity = $forecastmonthcapacity/4;
       // dd($forecastmonthcapacity);
        $contractroutes = Planassets::where('routeplanId', $routeplanId->id)->get();

        $availablemonthcapacity = 0;
        $assets = [];

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
        $assetRecord = Planassets::where('assetId', '=', $routes->assetId)->where('routeplanId','=', $routeplanId->id)->first();
         //   dd($assetRecord);

            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;

            }else{
                
                return back()->with('error', 'There are no resource to use, adjust your assigments for this Route'); 
            }
          
           
        }

      //  dd($availablemonthcapacity);

        //compare forecast vs current plan 
 

            $forecastmonthcapacity;
            $currentCapacity = 0;

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::where('id','=', $asset->id)->update([

                        'weekly' => 1,                      
                        'updatedBy' => $user->name,

                    ]);


                    $driversIds = Assetdriver::where('asset', '=' , $asset->assetId)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::where('driverId','=', $plandriver->id )->where('routeplanId','=', $routeplanId->id)->update([

                        'weekly' => 1,                      
                        'updatedBy' => $user->name,

                        ]);
                             
                    }
             

                }
               
                //dd($asset);

            }

            //produce plan to fit the forecastmonthcapacity


            //get all resources that are assigned to contract but still in resource pool

        dd('zvaita....');



        //output final plan 
    

        return view('planning.showweeklyrouteplan', compact('contracts'));
    }


    public function showrouteplandaily($id)
    {
       //dd($id);
       $user = auth()->user();

       $routeplanId = Routeplan::where('route','=', $id)->first();
       //Weekly Horizon being planned for

       //Get the forecast monthly plan/capacity
       $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
       $forecastmonthcapacity = $forecastmonthcapacity/30;
     //  dd($forecastmonthcapacity);
       $contractroutes = Planassets::where('routeplanId', $routeplanId->id)->get();

       $availablemonthcapacity = 0;
       $assets = [];

       //Get monthly current capacity
       foreach($contractroutes as $routes){
           
       $assetRecord = Planassets::where('assetId', '=', $routes->assetId)->where('routeplanId','=', $routeplanId->id)->first();
        //   dd($assetRecord);

           if($assetRecord != null){

               $assets[] = $assetRecord;
               $availablemonthcapacity += $assetRecord->payloadCapacity;

           }else{
               
               return back()->with('error', 'There are no resource to use, adjust your assigments for this Route'); 
           }
         
          
       }

     //  dd($availablemonthcapacity);

       //compare forecast vs current plan 


           $forecastmonthcapacity;
           $currentCapacity = 0;

           foreach($assets as $asset){

               if($currentCapacity <= $forecastmonthcapacity){

                   $currentCapacity += $asset->payloadCapacity;

                   $planassetcreate = Planassets::where('id','=', $asset->id)->update([

                       'daily' => 1,                      
                       'updatedBy' => $user->name,

                   ]);


                   $driversIds = Assetdriver::where('asset', '=' , $asset->assetId)->get();

                   foreach($driversIds as $driver){

                       $plandriver = Driver::where('id', '=', $driver->id)->first();
                       
                       $plandrivercreate = Plandrivers::where('driverId','=', $plandriver->id )->where('routeplanId','=', $routeplanId->id)->update([

                       'daily' => 1,                      
                       'updatedBy' => $user->name,

                       ]);
                            
                   }
            

               }
              
               //dd($asset);

           }

           //produce plan to fit the forecastmonthcapacity


           //get all resources that are assigned to contract but still in resource pool

       dd('zvaita....');



       //output final plan 
   

       return view('planning.showdailyrouteplan', compact('contracts'));
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
