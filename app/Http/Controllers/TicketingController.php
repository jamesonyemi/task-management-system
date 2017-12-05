<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticketing;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Notifications\SendTicketMail;
use SweetAlert;
// use Illuminate\Support\Facades\Auth;



class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $tickets = Ticketing::latest()->paginate(25);
            return view('tickets.index',compact('tickets'))
                ->with('p', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $watchers = User::latest()->paginate(10);
            return view('tickets.create',compact('watchers'))
                ->with('p', (request()->input('page', 1) - 1) * 5);
        // return view('tickets.create', compact(Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate([
               'first_name' => 'required',
               'last_name' => 'required',
               'issue_title'  => 'required',
               'assigned_by' => 'required',
               'priority' => 'required',
               'status' => 'required',
               'description' => 'required',
               'note' => 'required',
               'phone_number' => 'required',
               'assignee' => 'required',
               'project_name' => 'required',
               'employee_name' => 'required',
               // 'blob' => 'required',
            ]);
            $email= Ticketing::create($request->all());
            $email->notify(new SendTicketMail($email));
            SweetAlert::message('Good Job','Ticket created successfully','success')->autoclose(6000*2);  
            return redirect()->route('tickets.tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketing $ticketing)
    {
        if (  Auth::user()->id ) {
        return view('tickets.show', compact('ticketing'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketing $ticketing)
    {
        $watchers = User::latest()->paginate(10);
        return view('tickets.edit', compact('ticketing','watchers'))
                    ->with('p', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticketing $ticketing)
    {
        request()->validate([
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required',
             'issue_title'  => 'required',
             'assigned_by' => 'required',
             'priority' => 'required',
             'status' => 'required',
             'phone_number' => 'required',
             'assignee' => 'required',
             'project_name' => 'required',
             'note' => 'required',
             'employee_name' => 'required',
        ]);
        $ticketing->update($request->all());
        $ticketing->notify(new SendTicketMail($ticketing));
        SweetAlert::message('Good Job','Ticket Updated Successfully!','success')->autoclose(6000*2);  
        return redirect()->route('tickets.tickets.index');
            OneSignal::async()->sendNotificationCustom($parameters);              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketing $ticketing, $id)
    {
        Ticketing::destroy($id);
        return redirect()->route('tickets.tickets.index')
                          ->with('success', 'Ticketing deleted successfully');
    }
}
