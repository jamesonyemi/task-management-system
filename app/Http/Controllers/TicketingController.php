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
        $user = Auth::user();

        if(Gate::forUser($user)->allows('view-post', $id)) {
            return 'true';
        }

        return abort(403, trans('Sorry, not sorry!'));

       $tickets = Ticketing::latest()->paginate(10);
       // $tickets = Ticketing::with('user')->first();
       // return View::make('page')->with('userInfo',$userInfo);
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
        if (  Auth::user()->id == $id) {
        //your code here
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
             'priority' => 'required',
             'status' => 'required',
             'phone_number' => 'required',
             'assignee' => 'required',
             'project_name' => 'required',
             'employee_name' => 'required',
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
