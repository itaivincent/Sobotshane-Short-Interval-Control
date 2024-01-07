<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Contractasset;
use App\Models\Escalationformula;
use App\Models\Route;
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


    public function show(Request $request, $id){

        $contract = Contract::where('id', $id)->first();
        $routes = Route::where('contractId',$contract->id)->get();
        $contractassets = Contractasset::where('contract', $id)->get();
     
        $assets = [];

        foreach(   $contractassets as $assetId){

            $assetRecord = Asset::where('id', $assetId->asset )->first();
            $assets[] = $assetRecord;
        }

       // dd($assets);
        return view('assignments.show', compact('contract','routes','assets'));
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


        return redirect()->route('contracts.routesasset')->with('success', 'Assignment created successfully!');
    }



}
