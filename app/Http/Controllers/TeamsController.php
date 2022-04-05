<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Team;
use App\User;

use Illuminate\Http\Request;

class TeamsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index')->with('teams', Team::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeamRequest $request)
    {
        
        Team::Create([
            
            'name'      => $request->name,
            'user_id'   => $request->user

        ]);

        session()->flash('success', 'Team Created successfully.');

        return redirect(route('teams.index'));

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
        $team = Team::find($id);
        return view('teams.create')->with('team', $team)->with('users', User::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, $id)
    {
        
        $team = Team::find($id);
        
        $team->update([

            'name'      => $request->name,
            'user_id'   => $request->user

        ]);
        
        $team->save();

        session()->flash('success', 'Team Updated Successfully.');

        return redirect(route('teams.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $team = Team::find($id);

        $team->delete();

        session()->flash('success', 'Team Deleted Successfully.');

        return redirect(route('teams.index'));

    }
}