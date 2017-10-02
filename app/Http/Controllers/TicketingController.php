<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticketing;
use App\http\Controllers\Controller;


class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tickets = Ticketing::latest()->paginate(10);
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
        return view('tickets.create');
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
               'email' => 'required',
               'issue_title'  => 'required',
               'assigned_by' => 'required',
               // 'date_fixed' => 'required',
               // 'date_opened' => 'required',
               'priority' => 'required',
               'status' => 'required',
               'description' => 'required',
               'note' => 'required',
               'phone_number' => 'required',
               'assignee' => 'required',
               'project_name' => 'required',
               'employee_name' => 'required',
               // 'first_name' => 'required',
               // 'last_name' => 'required',
               // 'blob' => 'required',
            ]);
           Ticketing::create($request->all());
            return redirect()->route('tickets.tickets.index')
                            ->with('success','Ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketing $ticketing)
    {
        return view('tickets.show', compact('ticketing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketing $ticketing)
    {
        return view('tickets.edit', compact('ticketing'));
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
        ]);
        $ticketing->update($request->all());
        return redirect()->route('tickets.tickets.index')
                          ->with('success', 'Ticket updated successfully');
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
