<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
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


    public function store(Request $request)
    {

        dd($request->contract);


        return redirect()->route('contracts.create')->with('success', 'Contract created successfully!');
    }

}
