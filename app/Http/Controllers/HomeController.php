<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Employee;
use \App\Models\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function index()
        {
            $userdata = auth()->user();
            $userId = Auth::user()->id;
            $usercounts = Employee::where('user_id', $userId)->count();
            // dd($usercounts);
            return view('dashboard', compact('userdata', 'usercounts'));
        }
    }

