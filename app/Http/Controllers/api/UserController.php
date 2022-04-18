<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResourse;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrive all users
        $data = [
            'allUsers' => User::all(),
        ];
        
        return view('users.allUsers', $data);
    }
    
    public function addForm()
    {
        //return blade with form for adding user 
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate username, email and password when creating user
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        //creating new record in user table
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash :: make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect(route('getSingleUser', $user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get specific user record by id
        $data = [
            'user' => User::findOrFail($id),
        ];
        
        return view('users.singleUser', $data);
    }

    public function editUser($id)
    {
        //return blade to edit single users
        $data = [
            'user' => User::findOrFail($id),
        ];
        
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate username and email while updating single record in db
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required',
        ]);

        //update a user values in db
        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        
        return redirect(route('getSingleUser', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete specific user record by id
        $user = User::findOrFail($id);
        if($user->delete()) {
            return redirect(route('getUsers'));
        }
    }
}
