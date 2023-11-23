<?php

namespace App\Http\Controllers;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use Alert;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Userrole::all();
        $assets = Asset::all();

        return view('assets.index', compact('assets','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        $userrole = new Asset();
        $userrole->make = $request->make;
        $userrole->registration = $request->registration;
        $userrole->assetDescription =  $request->assetDescription;
        $userrole->vinNumber = $request->vinNumber;
        $userrole->payloadCapacity = $request->payloadCapacity;
        $userrole->weight = $request->weight;
        $userrole->assetType = $request->assetType;
        $userrole->licenseNumber = $request->licenseNumber;
        $userrole->mileage = $request->mileage;
        $userrole->fueltype = $request->fueltype;
        $userrole->registrationExpireDate = $request->registrationExpireDate;
        $userrole->CreatedBy = $user->name;

        $userrole->save();

        if($userrole){
            return redirect()->route('assets.create')->with('success', 'Asset created successfully!');
        }
          return redirect()->route('assets.create')->with('error', 'Asset created successfully!');
        
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
        $asset = Asset::where('id', $id)->first();

        return view('assets.edit', compact('asset'));
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
