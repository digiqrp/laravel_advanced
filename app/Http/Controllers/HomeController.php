<?php

    namespace App\Http\Controllers;


    use Illuminate\Support\Facades\App;

    class HomeController extends Controller
    {

        /**
         * Main Welcome View
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index()
        {
            $environment = App::environment();
            return view('welcome',['environment'=>$environment]);
        }

    }
