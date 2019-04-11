<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticketing;
use App\Models\Project;
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

        $count_on_project  =  'count_on_project';
        $count_on_user     =  'count_on_user';
        $count_on_ticket   =  'count_on_ticket';

        $all_counts = [
            $count_on_project  =>  Project::where('id', '>', 0, )->count(),
            $count_on_user     =>  User::where('id', '>', 0, )->count(),
            $count_on_ticket   =>  Ticketing::where('id', '>', 0, )->count(),
        ];

            $total_count_on_project = data_get($all_counts, $count_on_project);
            $total_count_on_user    = data_get($all_counts, $count_on_user);
            $total_count_on_ticket  = data_get($all_counts, $count_on_ticket);
       

        $tickets = Ticketing::latest()->paginate(25);
            return view('home', compact(
                    'tickets','total_count_on_project', 
                    'total_count_on_user', 'total_count_on_ticket'))
                    ->with('p', (request()->input('page', 1) - 1) * 5);

    }
}
