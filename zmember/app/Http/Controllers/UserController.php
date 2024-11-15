<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // create a user list model.
        $users = User::all();
        $users = User::paginate(10); // create paginated records.
        // dd($users); // debug list output.

        // view page = user.index, data variables = string users assigned to $users object.
        return view('user.index', [
            'users' => $users,
            'team' => 'Team Bravo'
        ]);
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
    public function edit(User $user)
    {
        // debug data user.
        // dd($user);

        // return user view by id
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // to update user detail.
        // echo "<br>";
        // var_dump($_POST);
        // dd($request, $user);

        // create validation rules.
        $rules = [
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|email|unique:users,email' . $user->id
        ];

        // get to validate data with rules set.
        $validated_data = $request->validate($rules);

        // assign user variable values to request values.
        $user->name = $validated_data['name']; // $request->name;
        $user->email = $validated_data['email']; // $request->email;

        // save new user details.
        $user->save();

        // redirect user.index after update with success alert.
        return redirect()->route('user.index')->with('success', 'User detail has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
