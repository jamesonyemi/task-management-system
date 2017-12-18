<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticketing;
use Auth;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use App\http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Notifications\SendTicketMail;
use App\Notifications\CompletedTask;
use App\Notifications\CancelledTask;
use App\Notifications\TaskInProgress;
use App\Notifications\OpenTask;
use App\Notifications\TaskOnHold;
use SweetAlert;


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

    public function showTaskDescription()
    {

        $tickets = Ticketing::latest()->paginate(25);
             return view('mail.ticket.complete',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $watchers = User::latest()->paginate(10);
         $projects = Project::latest()->paginate(10);
         $getProjectId  =  Ticketing::pluck('email','id')->all();

          foreach ($getProjectId as $key => $project_id) 
          {
             
            return view('tickets.create',compact('watchers','projects','project_id'))
                ->with('p', (request()->input('page', 1) - 1) * 5);
          }
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
               // 'project_id'=> $request->input('assigned_to')
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
        $projects = Project::latest()->paginate(10);
        $ProjectId  =  Ticketing::pluck('id','id')->all();

         foreach ($ProjectId as $key => $project_id) 
         {
           return view('tickets.edit', compact('ticketing','watchers','projects','project_id'))
                            ->with('p', (request()->input('page', 1) - 1) * 5);
         }
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
       $validateTicket[] = request()->validate([
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required',
             'issue_title'  => 'required',
             'assigned_by' => 'required',
             'priority' => 'required',
             'status' => 'required',
             'description' => 'required',
             'phone_number' => 'required',
             'assignee' => 'required',
             'project_name' => 'required',
             'note' => 'required',
             'employee_name' => 'required',
        ]);
        // dd($validateTicket[0]['status']);
    foreach ($validateTicket as $key => $getTicketStatus) {
          
        $ticketing->update($request->all());
        if (!empty($getTicketStatus['status'])) {

            switch ($getTicketStatus['status']) {

                case 'Open':
                    $ticketing->notify(new OpenTask($ticketing));
                    SweetAlert::message('Good Job','Ticket Updated Successfully!','question')->autoclose(6000*2);
                    return redirect()->route('tickets.tickets.index');
                    break;

                case 'Cancelled':
                    $ticketing->notify(new CancelledTask($ticketing));
                    SweetAlert::message('Good Job','Ticket ' .$getTicketStatus['status']. ' Successfully!','error')->autoclose(6000*2);
                    return redirect()->route('tickets.tickets.index');
                    break;

                case 'On Hold':
                    $ticketing->notify(new TaskOnHold($ticketing));
                    SweetAlert::message('Good Job','Ticket Updated Successfully!','warning')->autoclose(6000*2);
                    return redirect()->route('tickets.tickets.index');
                    break;

                case 'In Progress':
                    $ticketing->notify(new TaskInProgress($ticketing));
                    SweetAlert::message('Good Job','Ticket Updated Successfully!','info')->autoclose(6000*2);
                    return redirect()->route('tickets.tickets.index');
                    break;

                case 'Completed':
                    $ticketing->notify(new CompletedTask($ticketing));
                    SweetAlert::message('Good Job','Ticket Updated Successfully!','success')->autoclose(6000*2);
                    return redirect()->route('tickets.tickets.index');
                    break;
                
                default:
                   return redirect()->route('tickets.tickets.index');
                   break;
            }

        // $ticketing->notify(new SendTicketMail($ticketing));
        // SweetAlert::message('Good Job','Ticket Updated Successfully!','success')->autoclose(6000*2);  
        // return redirect()->route('tickets.tickets.index');
            // OneSignal::async()->sendNotificationCustom($parameters); 

        }

        // return "Merry ChristMas";
    }
            
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
