<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Userrole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Alert;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Userrole::all();
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Userrole::all();
        return view('users.create', compact('roles'));
    }


        /**
     * Show the form for creating a new resource.
     */
    public function parameters()
    {
        $roles = Userrole::all();
        return view('users.parameters', compact('roles'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $userrole = new User();
        $userrole->name = $request->name;
        $userrole->userName = $request->userName;
        $userrole->createdBy =  $user->name;;
        $userrole->address = $request->address;
        $userrole->email = $request->email;
        $userrole->city = $request->city;
        $userrole->country = $request->country;
        $userrole->age = $request->age;
        $userrole->phoneNumber = $request->phoneNumber;
        $userrole->department = $request->department;
        $userrole->userRole = $request->userRole;
        $userrole->employeeNumber = $request->employeeNumber;
        $userrole->password = Hash::make(12345678);
        $userrole->save();


        //Alert::success('Success Title', 'Success Message');

        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }



    public function userRole(Request $request) 
    {
        $user = auth()->user();

        $userrole = new Userrole();
        $userrole->Name = $request->Name;
        $userrole->Description = $request->Description;
        $userrole->CreatedBy = $user->name;
        $userrole->save();

        return redirect()->route('users.parameters')->with('success', ' User Role created successfully!');
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
