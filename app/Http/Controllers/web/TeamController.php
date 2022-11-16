<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeam;
use App\Team;
use App\Teams\TeamsRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public $teams;

    public function __construct(TeamsRepository $teams){
        $this->teams = $teams;
        $this->authorizeResource(Team::class,'team');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Team::all()->search(function($team){
        //    return $team->users_count > 2;
        //});
        //Team::all()->mapToGroups(function($team){
        //    return [$team->users_count,$team->id];
        //});

        //return Team::all()->transform(function ($team){
        //    $team->title = strtoupper($team->title);
        //    return $team;
        //});

        //$collection1 = Team::all();
        //$collection2 = $collection1->nth(2);
        //return $collection1->concat($collection2)->unique('created_at');

        return Team::all()->map->getTable();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team/create')->with('points',5);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTeam $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTeam $request)
    {
        $team = new Team();
        $team->title = $request->input('title');
        $team->save();
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        throw new \App\Exceptions\NotCompletedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }


    public function points(Team $team){
        $this->authorize('view',$team);
        return response()->json($this->teams->points($team));
    }

}
