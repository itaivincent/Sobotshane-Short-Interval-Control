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
use App\Models\Capability;
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
        
        $contracts = Contract::all();

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
