<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Route;
use App\Models\Driver;
use Alert;
use Auth;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $userrole = new Driver();
        $userrole->number = $request->number;
        $userrole->provider = $request->provider;
        $userrole->client = $request->client;
        $userrole->duration =  $request->duration;
        $userrole->commodity = $request->commodity;
        $userrole->effectiveDate = $request->date;
        $userrole->save();

        if($userrole){
            return redirect()->route('drivers.create')->with('success', 'Driver created successfully!');
        }
          return redirect()->route('drivers.create')->with('error', 'Failed to create Driver!');
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
        $driver = Driver::where('id',$id)->first();

        return view('drivers.edit', compact('driver'));
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
