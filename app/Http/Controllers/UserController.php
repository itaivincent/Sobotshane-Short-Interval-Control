<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Userrole;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }


        /**
     * Show the form for creating a new resource.
     */
    public function parameters()
    {
        return view('users.parameters');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->name);

        $user = auth()->user();

        $userrole = new User();
        $userrole->name = $request->name;
        $userrole->userName = $request->userName;
        $userrole->createdBy = $user->createdBy;
        $userrole->address = $request->address;
        $userrole->email = $request->email;
        $userrole->city = $user->city;
        $userrole->country = $request->country;
        $userrole->age = $request->age;
        $userrole->phoneNumber = $user->phoneNumber;
        $userrole->department = $request->department;
        $userrole->userRole = $request->userRole;
        $userrole->employeeNumber = $user->employeeNumber;
        $userrole->password = $request->password;
        $userrole->save();

        return response()->json(['message' => 'Data saved successfully'], 201);
    }



    public function userRole(Request $request) 
    {
        $user = auth()->user();

        $userrole = new Userrole();
        $userrole->Name = $request->Name;
        $userrole->Description = $request->Description;
        $userrole->CreatedBy = $user->name;
        $userrole->save();

        return response()->json(['message' => 'Data saved successfully'], 201);
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
