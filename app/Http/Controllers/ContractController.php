<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Escalationformula;
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
        $userrole->contractId = $request->contract;
        $userrole->rate = $request->rate;
        $userrole->routeCategory = $request->routeCategory;
        $userrole->type = $request->type;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return redirect()->route('contracts.parameters')->with('success', 'Route created successfully!');
        }
          return redirect()->route('contracts.parameters')->with('error', 'Failed to create Route!');
       
    }


    public function formulaStores(Request $request)
    {
     
        $LabourIndexattheenddate = 10;
        $LabourIndexatthebasedate = 4;
        $FuelDieselIndexattheenddate = 30;

        $numbers = $request->input('numbers');
        $operations = $request->input('operations');

        foreach($numbers as $key => $number){

          //  $getnumber = Parameters::where( $number, '!=' , null )->first();
            $numbers[$key] = $LabourIndexattheenddate + $key;
         //   dd($numbers[$key]);

        }
      //  dd($numbers);

        if (count($numbers) < 2 || count($numbers) != count($operations) + 1) {
            // Handle validation or error as needed
            return back()->with('error', 'Invalid Input!');
        }

        $result = $numbers[0];

        for ($i = 0; $i < count($operations); $i++) {
            switch ($operations[$i]) {
                case 'add':
                    $result += $numbers[$i + 1];
                    break;
                case 'subtract':
                    $result -= $numbers[$i + 1];
                    break;
                case 'multiply':
                    $result *= $numbers[$i + 1];
                    break;
                case 'divide':
                    // Check if the divisor is not zero to avoid division by zero
                    $result = ($numbers[$i + 1] != 0) ? $result / $numbers[$i + 1] : 'Undefined (division by zero)';
                    break;
                default:
                    // Handle invalid operation
                    return back()->with('error', 'Failed to calculate formula!');
            }
        }

            return back()->with('success', 'Formula calculated and your rate is '.$result.'');
     
    }


    public function formulaStoress(Request $request)
    {
        $user = auth()->user();
        $route = $request->route;
        $routeDetails =  Route::where('id', '=' , $route )->first();
        $contract = $routeDetails->contractId;
        if($contract == null){

            return back()->with('warning', 'This route is not linked to a contract!');  
        }    
        $expression = $request->input('userInput');
        $explodedforumla =  $request->input('userInput');
        $storeFormula = implode($explodedforumla);
      // dd($storeFormula);
        $dummy = 10;
      //  dd($expression);
        foreach($expression as $key => $number){

            //  $getnumber = Parameters::where( $number, '!=' , null )->first();
            if($expression[$key] != '+' &  $expression[$key] != '-' & $expression[$key] != '*' & $expression[$key] != '/'  & $expression[$key] != '('  & $expression[$key] != ')'){

                if($expression[$key] == 'OR'){
                    $rate = Route::where('id', '=' , $route )->first();
                    $expression[$key] = $rate->rate;
                 //   dd($rate);
                }elseif($expression[$key] == 'L1'){

                    $LabourIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $LabourIndexatthebasedate->baseIndices;
                    
                }elseif($expression[$key] == 'L0'){

                    $LabourIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $LabourIndexattheenddate->endIndices;
                    
                }elseif($expression[$key] == 'F1'){

                    $FuelDieselIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                //   dd($FuelDieselIndexattheenddate);
                    $expression[$key] = $FuelDieselIndexattheenddate->endIndices;
                    
                }elseif($expression[$key] == 'F0'){

                    $FuelDieselIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $FuelDieselIndexatthebasedate->baseIndices;
                    
                }elseif($expression[$key] == 'CC1'){

                    $CapitalCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $CapitalCostIndexattheenddate->endIndices;
                    
                }elseif($expression[$key] == 'CC0'){

                    $CapitalCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $CapitalCostIndexatthebasedate->baseIndices;
                    
                }elseif($expression[$key] == 'RM1'){

                    $RepairandMaintenanceIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $RepairandMaintenanceIndexattheenddate->endIndices;
                    
                }elseif($expression[$key] == 'RM0'){

                    $RepairandMaintenanceIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $RepairandMaintenanceIndexatthebasedate->baseIndices;
                    
                }elseif($expression[$key] == 'OC1'){

                    $OtherCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $OtherCostIndexattheenddate->endIndices;
                    
                }elseif($expression[$key] == 'OC0'){

                    $OtherCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $OtherCostIndexatthebasedate->baseIndices;
                    
                }elseif($expression[$key] == 'L(%)'){

                    $LabourWeightage = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $LabourWeightage->weightage;
                    
                }elseif($expression[$key] == 'F(%)'){

                    $FuelWeightage = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $FuelWeightage->weightage;
                    
                }elseif($expression[$key] == 'C(%)'){

                    $CapitalWeightage = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $CapitalWeightage->weightage;
                    
                }elseif($expression[$key] == 'R(%)'){

                    $RepairWeightage = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $RepairWeightage->weightage;
                    
                }elseif($expression[$key] == 'O(%)'){

                    $OtherCostWeightage = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = $OtherCostWeightage->weightage;
                    
                }else{

                    $expression[$key] = null;
                }

              //  $getnumber = Parameters::where( $number, '!=' , null )->first();             
            }            
             // dd($numbers[$key]);
          }

       //  dd($expression);

       $expression = implode($expression);
    //  dd($expression);
       // dd($text);
        $result = $this->calculateResult($expression);
       

        $userrole = new Formula();
        $userrole->formula = $expression;
        $userrole->equation = $storeFormula;
        $userrole->contract = $contract;
        $userrole->result = $result;
        $userrole->createdBy = $user->name;
        $userrole->save();

       // dd($result);
        if($result == null){

            return back()->with('warning', 'You make a mistake in your formula! Try again');
        }
        return back()->with('success', 'Formula calculated and your rate is '.$result.'');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contract = Contract::where('id',$id)->first();

        return view('contracts.edit', compact('contract'));
    }


    public function pdf(string $id)
    {
       
        $path = public_path('storage/contracts/' . $id);
       // dd(file_exists($path));
        if (file_exists($path)) {
            return Response::download($path, $id, ['Content-Type' => 'application/pdf']);
        } else {
            return back()->with('error', 'Could not down contract!');
        }
    }


    public function escalationFormula(Request $request)
    {
       // dd($request->costComponent);
       $user = auth()->user();
        $userrole = new Escalationformula();
        $userrole->costComponent = $request->costComponent;
        $userrole->weightage = $request->weightage/100;
        $userrole->indexSourceTable = $request->indexSourceTable;
        $userrole->baseIndices = $request->baseIndices;
        $userrole->baseDate = $request->baseDate;
        $userrole->endIndices =  '190.4';
        $userrole->frequency = $request->frequency;
        $userrole->contract = $request->contract;
        $userrole->createdBy = $request->createdBy;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return back()->with('success', 'Parameter created!');
        }
          return back()->with('error', 'Failed to create parameter!');
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
