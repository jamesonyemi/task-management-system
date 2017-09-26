<?php

namespace App\Http\Controllers;

use App\Ticketing;
use Illuminate\Http\Request;

class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tickets = Ticketing::latest()->paginate(1);
            return view('tickets.index',compact('tickets'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
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
            return redirect()->route('tickets.index')
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
        return view('tickets.show', compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketing $ticketing)
    {
        return view('tickets.edit', compact('tickets'));
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
            ''
        ]);
        $ticketing->update($request->all());
        return redirect()->route('tickets.index')
                          ->with('success', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketing $ticketing)
    {
        Ticketing::destroy($id);
        return redirect()->route('tickets.index')
                          ->with('success', 'Ticketing deleted successfully');
    }
}
