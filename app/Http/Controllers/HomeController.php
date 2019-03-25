<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticketing;
use SweetAlert;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticketing::latest()->paginate(25);
            return view('home',compact('tickets'))
                ->with('p', (request()->input('page', 1) - 1) * 5);
        // return view('home');
    }
}
