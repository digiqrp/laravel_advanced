<?php
    namespace App;

   class TeamPointsComposer{

       public $teams;

       public function __construct(\App\Teams\TeamsRepository $teams){
           $this->teams = $teams;
       }

       public function create(\Illuminate\View\View $view){
           $view->with('points',$this->teams->points(\App\Team::first()));
       }


   }
