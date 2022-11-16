<?php
namespace App\Teams;

use Illuminate\Support\Facades\Log;

Class TeamsRepository{
    public function points($team){
        Log::info('Teams Repo Called');

        $users = $team->where('teams.id',$team->id)
            ->join('users','teams.id','=','users.team_id')
            ->select('users.id');

        return $team->where('teams.id',$team->id)
            ->join('tickets','teams.id','=','tickets.team_id')
            ->join('points','tickets.id','=','points.ticket_id')
            ->wherein('points.owner_id',$users)
            ->sum('points.value');
    }


}
