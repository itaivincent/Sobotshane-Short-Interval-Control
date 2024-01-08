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
use App\Models\Escalationformula;
use App\Models\Route;
use DB;
use App\Models\Routeratetracker;
use Carbon\Carbon;


class AssignmentController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();

        return view('assignments.index', compact('contracts'));
    }

    public function create()
    {
        $contracts = Contract::all();
        $routes = Route::all();
        $assets = Asset::all();

        return view('assignments.create', compact('contracts','routes','assets'));
    }

    
    public function capability()
    {
       // $totalforecastMonthlyVolume = Contract::sum('forecastMonthlyVolume');

        $totalforecastMonthlyVolume = Contract::select(DB::raw('SUM(CAST(forecastMonthlyVolume AS DECIMAL(10, 2))) as total'))->get()[0]->total;
        $totalrequiredMonthlyVolume = Contract::select(DB::raw('SUM(CAST(requiredMonthlyVolume AS DECIMAL(10, 2))) as total'))->get()[0]->total;
        $totalTonCapacity = Asset::where('status','=', '1')->sum('payloadCapacity');
       // dd($totalforecastMonthlyVolume,$totalTonCapacity);

        return view('assignments.capability', compact('totalTonCapacity','totalrequiredMonthlyVolume','totalforecastMonthlyVolume'));
    }



    public function show(Request $request, $id){

        $contract = Contract::where('id', $id)->first();
        $routes = Route::where('contractId',$contract->id)->get();
        $contractassets = Contractasset::where('contract', $id)->get();
     
        $assets = [];
        $capability = 0;

        foreach($contractassets as $assetId){

            $assetRecord = Asset::where('id', $assetId->asset )->first();
            $assets[] = $assetRecord;
            $capability += $assetRecord->payloadCapacity;
        }


        return view('assignments.show', compact('contract','routes','assets','capability'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $routes = $request->input('routesIds');
        $assets = $request->input('assetIds');
        $contract = $request->contract;

        foreach($routes as $key => $number){

          //  dd($routes[$key]);
            $routeUpdate = Route::where('id', '=', $routes[$key])->update([

                'contractId' => $contract
            ]);
        }

        foreach($assets as $key => $number){

            $asset = Asset::where('id', $assets[$key] )->first();

            $assetCreate = Contractasset::create([

                'contract' => $contract,
                'asset' => $asset->id,
                'createdBy' =>  $user->name

            ]);
        }


        return redirect()->route('contracts.create')->with('success', 'Assignment created successfully!');
    }


    public function routesasset(){

        $contracts = Contract::all();
        $routes = Route::all();
        $assets = Asset::all();

        return view('assignments.routesasset', compact('contracts','routes','assets'));
    }

    public function storeroutesasset(Request $request)
    {
       // dd($request->route,$request->input('assetIds'));
        $user = auth()->user();
        $assets = $request->input('assetIds');
        $route = $request->route;

          //  dd($routes[$key]);
            $route = Route::where('id', '=', $route)->first();


        foreach($assets as $key => $number){

            $asset = Asset::where('id', $assets[$key] )->first();

            $assetCreate = Routeasset::create([

                'contract' => $route->contractId,
                'route' => $route->id,
                'asset' => $asset->id,
                'createdBy' =>  $user->name

            ]);
        }


        return redirect()->route('assignments.routesasset')->with('success', 'Assignment created successfully!');
    }



    public function assetdriver(){

     
        $drivers = Driver::all();
        $assets = Asset::all();

        return view('assignments.assetdriver', compact('drivers','assets'));
    }

    public function storeassetdriver(Request $request)
    {
      //  dd($request->asset,$request->input('driverIds'));
        $user = auth()->user();
        $drivers = $request->input('driverIds');
        $asset = $request->asset;

          //  dd($routes[$key]);
            $route = Route::where('id', '=', $route)->first();


        foreach($assets as $key => $number){

            $asset = Asset::where('id', $assets[$key] )->first();

            $assetCreate = Routeasset::create([

                'contract' => $route->contractId,
                'route' => $route->id,
                'asset' => $asset->id,
                'createdBy' =>  $user->name

            ]);
        }


        return redirect()->route('assignments.routesasset')->with('success', 'Assignment created successfully!');
    }




}
