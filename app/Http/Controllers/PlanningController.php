<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Routeasset;
use App\Models\Contract;
use App\Models\Driver;
use App\Models\Routecapacity;
use App\Models\Formula;
use App\Models\Contractasset;
use App\Models\Contractplan;
use App\Models\Routeplan;
use App\Models\Monthlyforecast;
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
        $user = auth()->user();
        $routes = Route::all();
        $contracts = Contract::all();

        foreach($routes as $route){

          
            $date = Carbon::now();
            $forecast = Monthlyforecast::where('route', '=' , $route->id)->where('month', '=', $date->format('F'))->first();

            if( $forecast == null){

                $forecastValue = 0;
            }else{
                $forecastValue = $forecast->forecastValue; 
            }
          //  dd($forecast);

            $contractroutes = Routeasset::where('route', $route->id)->get();

            $availablemonthcapacity = 0;
     
            //Get monthly current capacity
            foreach($contractroutes as $routes){
                
                $assetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', 1)->first();
          
                if($assetRecord != null){ 
                 
                    $availablemonthcapacity += $assetRecord->payloadCapacity;            
    
                }
                       
            }


            $routecheck = Routecapacity::where('route', $route->id)->count();

            if($routecheck > 0){

                $routecapacity = Routecapacity::where('route' , $route->id)->update([
                 
                    'contractVolume'    => $route->totalQuantity,
                    'totalforecast'     => $route->estimatedmonthQuantity,
                    'monthlyforecast'   => $forecastValue,
                    'capacity'          => $availablemonthcapacity,
                    'updatedBy'         => $user->name,
    
                ]);

            }else{

                $routecapacity = Routecapacity::create([

                    'route'             => $route->id,
                    'contractVolume'    => $route->totalQuantity,
                    'totalforecast'     => $route->estimatedmonthQuantity,
                    'monthlyforecast'   => $forecastValue,
                    'capacity'          => $availablemonthcapacity,
                    'createdBy'         => $user->name,
    
                ]);
            }

        }


        $allroutes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->get();
        
     //   dd($allroutes);

        return view('planning.routeplan', compact('allroutes','contracts'));
    }



    public function showrouteplan($id)
    {
   
        $user = auth()->user();

        //Monthly Horizon being planned for
       // dd($id);
        //Get the forecast monthly plan/capacity
        $date = Carbon::now();
        $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
       
        if($threemonthcheck > 0){

            $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
            $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;

        }else{

            $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        }

    

        $contractroutes = Routeasset::where('route', $id)->get();
        $contractroutescount = Routeasset::where('route', $id)->count();

       // dd($contractroutes);
        $availablemonthcapacity = 0;
        $assets = [];
        

        if($contractroutescount  == 0){
            
            return back()->with('error', 'This route needs asset assignments to be made first!'); 
        }

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
            $assetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', 1)->first();
      
            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;
                $activity = 1;

            }else{
                
                $activity = 0;
                continue;
            }
     
           
        }

       // dd($availablemonthcapacity);

        //compare forecast vs current plan 

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Routeplan::create([

                'duration' => 1,
                'route' => $id,
                'activity' => $activity,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);


            foreach($assets as $asset){

              //  dd($asset);

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

                        'routeresourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();
                  //  dd($driversIds);
                    foreach($driversIds as $driver){
                      //  dd($driver);
                        $plandriver = Driver::where('id', '=', $driver->driver)->where('status', '=', '1')->first();
          
                        if($plandriver){

                            $plandrivercreate = Plandrivers::create([

                                'routeplanId' => $contractplancreate->id,
                                'name'            =>$plandriver->name, 
                                'driverId'         =>$plandriver->id, 
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
                            
                            'routeresourcePoolStatus' => '1',
                        ]);

                        }
                                           
                    }
             
                }
               
               // dd($asset);

            }

            //produce plan to fit the forecastmonthcapacity

            $unavailableassets = [];
            $unavailabledrivers = [];
            //get all resources that are assigned to contract but still in resource pool
            foreach($contractroutes as $routes){
               
                $unassetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', '2')->first();
          
                if($unassetRecord != null){
    
                    $unavailableassets[] = $unassetRecord;
            
                }
                          
            }

          //  dd($unavailableassets);

            foreach($unavailableassets as $unasset){

           // dd($unasset);
            $driverss = Assetdriver::where('asset', '=' , $unasset->id)->get();
            //  dd($driverss);
              foreach($driverss as $driver){
       
                  $unplandriver = Driver::where('id', '=', $driver->driver)->where('status', '=', '2')->first();
    
                  if($plandriver){

                    
                    $unavailabledrivers[] = $unplandriver;

                    }
                }

            }

          //  dd($unavailabledrivers, $unavailableassets);

    

     
        $title = 'Remove item!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $routeplan = Routeplan::where('id', '=' ,  $contractplancreate->id)->first();
       // dd($routeplan);
       $routecapcheck = Routecapacity::where('route', '=' , $routeplan->route)->count();
      // dd($routecapcheck);

    
       if($routecapcheck > 0){

        $routecapcheck = Routecapacity::where('route', '=' , $routeplan->route)->update([

            'capacity' => $availablemonthcapacity

        ]);

        $routes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->where('routes.id','=',  $routeplan->route)
        ->get();

       }else{

        $routes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->where('routes.id','=',  $routeplan->route)
        ->get();

       }
        
      
        
        $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
        $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();

        // $assetdrivers = [];

        // foreach( $routeplanassets as $assets){

        //    $assetcount = Assetdriver::where('asset', $assets->assetId)->count();
        //    $asset = Assetdriver::where('asset', $assets->assetId)->first();
        //    if($assetcount > 0 ){

        //     $assetdrivers[] =  $asset;
        //    }


        // }
        // dd($combinedresources);

        return view('planning.showmonthlyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers','unavailableassets','unavailabledrivers'));
    }

    public function showrouteplanweekly($id)
    {
        //dd($id);
        $user = auth()->user();

        $routeplanId = Routeplan::where('route','=', $id)->where('activity','=', '1')->latest()->first();
       // dd($routeplanId);
        //Weekly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $date = Carbon::now();
        $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
       
        if($threemonthcheck > 0){

            $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
            $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;


        }else{

            $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        }
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
                
                return back()->with('error', 'There are no resources to use, adjust your assigments for this Route'); 
            }
          
           
        }

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

            }

            $title = 'Remove item!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            $routeplan = $routeplanId;
            $routes = DB::table('routes')
            ->join('routecapacities','routecapacities.route','=','routes.id')
            ->where('routes.id','=',  $routeplan->route)
            ->get();
            $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
            $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();

        //    dd($routeplan,$routeplanassets,$routeplandrivers);
        return view('planning.showweeklyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers'));
    }


    public function showrouteplandaily($id)
    {
       //dd($id);
       $user = auth()->user();

       $routeplanId = Routeplan::where('route','=', $id)->where('activity','=', '1')->latest()->first();
       //Weekly Horizon being planned for

       //Get the forecast monthly plan/capacity
       $date = Carbon::now();
       $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
      
       if($threemonthcheck > 0){

           $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
           $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;


       }else{

           $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
       }
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
           $title = 'Remove item!';
           $text = "Are you sure you want to delete?";
           confirmDelete($title, $text);

           //get all resources that are assigned to contract but still in resource pool

           $routeplan = $routeplanId;

           $routes = DB::table('routes')
           ->join('routecapacities','routecapacities.route','=','routes.id')
           ->where('routes.id','=',  $routeplan->route)
           ->get();

           $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
           $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();
   

       return view('planning.showdailyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers'));
    }


    public function editroutemonthlyplandriver($id){


    $plandriver = Plandrivers::where('id', $id)->first();

    $actualdriver = Driver::where('id', $plandriver->driverId)->update([

        'status' => '2'
    ]);

    if($plandriver){

        return back()->with('success', 'Driver removed from plan successfully!'); 

    }else{

        return back()->with('error', 'Failed to remove driver!'); 
    }
    
    }


    public function editroutemonthlyplanasset($id){

        $plandriver = Planassets::where('id', $id)->first();

        $actualAsset= Asset::where('id', $plandriver->assetId)->update([

            'status' => '2'
        ]);
    
        if($plandriver){
    
            return back()->with('success', 'Asset removed from plan successfully!'); 
    
        }else{
    
            return back()->with('error', 'Failed to remove Asset!'); 
        }
        
        }





        public function reassignroutemonthlyplanasset($id){

           
            $asset = Planassets::where('assetId', $id)->latest()->first();
            $routes = Route::all();
       
            return view('planning.reassignasset', compact('asset','routes'));
            
            }



            public function reassignasset(Request $request,$id){

           
              // dd($request->routeplan, $request->route);

               $asset = Routeasset::where('asset', $id)->update([

                'route' => $request->route,

               ]);

             $routeplan = Routeplan::where('id', $request->routeplan)->first();
         
             return redirect()->route('planning.showrouteplan', [$routeplan->route])->with('success', 'Asset created re-assigned!');
                
           }



        public function confirmplan($id){

           $routeplan = Routeplan::where('id', $id)->first(); 

           $routeplanUpdate = Routeplan::where('id', $id)->update([

            'confirmation' => '1'

           ]); 

           $routeplanassetUpdate = Planassets::where('routeplanId', $routeplan->id)->where('daily','=' , '1')->update([

             'confirmation' => '1'

           ]); 

           $routeplandriverUpdate = Plandrivers::where('routeplanId', $routeplan->id)->where('daily','=' , '1')->update([
            
            'confirmation' => '1'
            
           ]); 


             if($routeplanassetUpdate && $routeplandriverUpdate){

                $routes = Route::where('id', '=' , $routeplan->route)->get();
                $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->where('daily','=' , '1')->where('confirmation','=' , '1')->get();
                $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->where('daily','=' , '1')->where('confirmation','=' , '1')->get();

               }else{

                return back()->with('error', 'Failed to confrim plan!'); 
               }

               return view('planning.dailyrouteschedule', compact('routeplan','routes','routeplanassets','routeplandrivers'));

              
            
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
