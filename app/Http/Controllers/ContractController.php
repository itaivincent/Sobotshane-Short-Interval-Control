<?php

namespace App\Http\Controllers;

use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Route;
use Alert;
use Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'contractImage' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $file = $request->file('contractImage');
        $fileName = time().'.'.$request->contractImage->extension();
        if ($file !== null) {
        $path = $request->file('contractImage')->store('public/contracts');  
       }

        $user = auth()->user();

        $userrole = new Contract();
        $userrole->number = $request->number;
        $userrole->provider = $request->provider;
        $userrole->client = $request->client;
        $userrole->duration =  $request->duration;
        $userrole->commodity = $request->commodity;
        $userrole->effectiveDate = $request->date;
        $userrole->contractValue = $request->contractValue;
        $userrole->forecastMonthlyVolume = $request->forecastMonthlyVolume;
        $userrole->forecastWeeklyVolume = $request->forecastWeeklyVolume;
        $userrole->forecastDailyVolume = $request->forecastDailyVolume;
        $userrole->requiredMonthlyDistance = $request->requiredMonthlyDistance;
        $userrole->requiredMonthlyQuantity = $request->requiredMonthlyDistance * $request->requiredMonthlyVolume;
        $userrole->requiredMonthlyVolume = $request->requiredMonthlyVolume;
        $userrole->image =$request->file('contractImage')->hashName();
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){
            return redirect()->route('contracts.create')->with('success', 'Contract created successfully!');
        }
          return redirect()->route('contracts.create')->with('error', 'Failed to create Contract!');
       
    }


    public function parameters()
    {
        $roles = Userrole::all();
        $routes = Route::all();
        $formulas = Formula::all();
        $contracts = Contract::all();
        return view('contracts.parameters', compact('roles', 'routes','formulas','contracts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function formulaStore(Request $request)
    {
        $user = auth()->user();
        $expression = $request->formula;
        $result = $this->calculateResult($expression);
        if($result == null){

            return back()->with('warning', 'You make a mistake in your formula! Try again');
        }

        $userrole = new Formula();
        $userrole->formula = $request->formula;
        $userrole->equation = $request->equation;
        $userrole->route = $request->route;
        $userrole->result = $result;
        $userrole->createdBy = $request->createdBy;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return back()->with('success', 'Formula calculated and your rate is '.$result.'');
        }
          return back()->with('error', 'Failed to calculate formula!');
     
    }

    private function calculateResult($expression)
    {
        // Use a library or a safe method to evaluate the mathematical expression
        // For example, using the eval() function (be cautious with user input)
        try {
            $result = eval("return $expression;");
            return $result;
        } catch (\Throwable $e) {
            // Handle errors (e.g., invalid expressions)
            return null;
        }
    }



    public function routeStore(Request $request)
    {
        $user = auth()->user();

        $userrole = new Route();
        $userrole->from = $request->from;
        $userrole->to = $request->to;
        $userrole->activity = $request->activity;
        $userrole->distance =  $request->distance;
        $userrole->unit = $request->unit;
        $userrole->routeCategory = $request->routeCategory;
        $userrole->type = $request->type;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return redirect()->route('contracts.parameters')->with('success', 'Route created successfully!');
        }
          return redirect()->route('contracts.parameters')->with('error', 'Failed to create Route!');
       
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
