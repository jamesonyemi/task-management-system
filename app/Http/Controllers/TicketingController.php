<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticketing;
use Auth;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
// use App\http\Controllers\Controller;
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
    // this is for a temporary use
    public $TICKET_EDIT_MODE  =  'tickets.tickets.edit';
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
         $project_id = Project::pluck('id','id')->all();
         $projects = Project::latest()->paginate(10);
         $tickets = Ticketing::latest()->paginate(10);
         $statusOnEditMode = !(url($this->TICKET_EDIT_MODE)) ? true : false;        
         $assigned_to  =  User::pluck('name','id')->all();

          if ( Auth::user()->id )
          {
             
            return view('tickets.create',compact('watchers','statusOnEditMode','projects','project_id','assigned_to','tickets'))
                ->with('p', (request()->input('page', 1) - 1) * 5);
          }

          foreach ($getProjectId as $key => $project_id) 
          {
            
            return view('tickets.create',compact('watchers','projects','project_id','assigned_to'))
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
            //    'first_name' => 'required',
            //    'last_name' => 'required',
            //    'note' => 'required',
            //    'phone_number' => 'required',
            // 'project_id'=> $request->input('assigned_to')
            // 'blob' => 'required',
            // 'employee_name' => 'required',
            // 'status' => 'required',
               'issue_title'  => 'required',
               'created_by' => 'required',
               'priority' => 'required',
               'description' => 'nullable',
               'assignee' => 'required',
               'project_id' => 'required',
            ]);
            $email= Ticketing::create($request->all());
            $email->notify(new SendTicketMail($email));
            // OneSignal::sendNotificationToUser("Some Message", $email, $url = null, $data = null);
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
    public function edit($id,Request $request)
    {
         $watchers     =   User::latest()->paginate(10);
         $projects     =   Project::latest()->paginate(10);
         $tickets      =   Ticketing::latest()->paginate(10);
         $ticketings   =   Ticketing::findOrfail($id);
         $project_id   =   Project::pluck('id','id')->all();
         $assigned_to  =   User::pluck('name','id')->all();
         $statusOnEditMode =  url($this->TICKET_EDIT_MODE);
        //  dd($statusOnEditModeIs);
         
        return view('tickets.edit', compact('tickets','statusOnEditMode','ticketings','watchers','projects','project_id','assigned_to'))
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
       $validateTicket[] = request()->validate([
            
             'issue_title'  => 'required',
             'created_by' => 'required',
             'priority' => 'required',
             'status' => 'nullable',
             'description' => 'nullable',
             'phone_number' => 'nullable',
             'assignee' => 'required',
             'project_id' => 'required',

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
