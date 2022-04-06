<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserController;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        User::Create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ]);

        session()->flash('success', 'User Created successfully.');

        return redirect(route('user.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.create')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserController $request, $id)
    {
        $user = User::find($id);
        
        $user->update([

            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password

        ]);
        $user->save();

        session()->flash('success', 'User Updated Successfully.');

        return redirect(route('user.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('success', 'User Deleted Successfully.');

        return redirect(route('user.index'));
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);

        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User made admin successfully.');

        return redirect(route('user.index'));
    }

    public function makeWriter($id)
    {
        $user = User::find($id);

        $user->role = 'writer';

        $user->save();

        session()->flash('success', 'User made writer successfully.');

        return redirect(route('user.index'));
    }
    
}