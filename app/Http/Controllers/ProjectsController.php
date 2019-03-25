<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Ticketing;
use App\User;
use App\Blobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketingController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\SendEmailToUsers;
use Auth;
use DB;

class ProjectsController extends Controller
{
    // use Notifiable;

    /**
     * Display a listing of the projects.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        
         $projects = Project::latest()->paginate();
            return view('projects.index',compact('projects'))
                  ->with('p', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new project.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // $assignedBies =  Ticketing::pluck('created_by','id')->all(); 
        $projects = Project::all();
        // dd($projects);
        $teamLead  =  User::pluck('name','id')->all();
        return view('projects.create', compact('teamLead', 'projects'));
    }

    /**
     * Store a new project in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $this->affirm($request);
            $data = $this->fileUpload($request);
            $data = $this->getData($request);
            $file = $request->file('blob_id');


            $projects = Project::create($data);

            return redirect()->route('projects.project.index')
                             ->with('success_message', 'Project was successfully added!');

        } 

        catch (Exception $exception) 
        {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request']);
        }
    }

    /**
     * Display the specified project.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $project = Project::with('assignedby')->findOrFail($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        // $id = $id;
        $change_teamLead = User::pluck('name', 'id');
        $project = Project::findOrFail($id);
        $team_leader = Project::all();

        // // $data = 'This is a test!';
        // Mail::to('developergh21@gmail.com')->send(new SendEmailToUsers('$data'));
        // $assigned_to = Project::groupBy('assigned_to')
        //                 ->select(['assigned_to'], DB::raw('count(*) as total'))
        //                 ->orWhere('assigned_to', '=', Auth::user()->name)
        //                 ->orderBy('assigned_to')
        //                 ->distinct()
        //                 ->get(); 

        // dd($assigned_to);
        // $userGrouping = $users = DB::table('users')
        //     ->join('projects', 'projects.user_id', '=', 'users.id')
        //     ->select('users.*','users.name as username','projects.name as project_name','projects.assigned_to', 'projects.id as project_id')
        //     ->groupBy('users.id')
        //     ->distinct()
        //     ->get();
        // dd($userGrouping);

        // dd($assigned_to);
        // $assigned_to = Project::pluck('assigned_to','user_id')->all();
        // return view('projects.edit', compact('project','assigned_to','id','change_teamLead' ));
        return view('projects.edit', compact('project','team_leader' ));

    }

    public function changeTeamLead()
    {
        $change_teamLead = User::pluck('name', 'id');
         return view('projects.change_teamlead', compact('change_teamLead'));
    }

    /**
     * Update the specified project in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        try {
            $this->affirm($request);
            $this->processDataUpdate($id,$request);
            $send_email = array();
            $notify_team_lead = Project::all();
            // This is the email you want to send to.
            // $user->email = 'developergh21@gmail.com'; 
            foreach ($notify_team_lead as $key => $value) {
                # code...
                $value->id = $id;
                $value->email = $request->email ;
                $send_email[$id] = $value->email;
                // return $send_email;
            }  
            Mail::to($send_email)->send(new SendEmailToUsers($notify_team_lead));
            return redirect()->route('projects.project.index')
            ->with('success_message', 'Project was successfully updated!');
            // $order = 'developergh21@gmail.com';
            // Mail::to($order)->send(new SendEmailToUsers($order));
        //    dd($user);

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request']);
        }        
    }

    public function processDataUpdate($id, Request $request)
    {
        # code...
        // $file = $request->file('blob_id');
        $currentBlob = Project::get()->where('id', '=',$id);
        // dd($currentBlob);
        foreach ($currentBlob as $key => $value) {
            # code...
            $b = $value['blob_id'];
           
        }
        
        $fileBeenUploaded = $this->fileUpload($request);
        $allRequestData   = $this->getData($request);
        \is_null($b) ?
        $up = DB::table('projects')->where('id',$id)->update(
            $allRequestData,
            $fileBeenUploaded,
        )
         : 
         $up = DB::table('projects')->where('id',$id)->update(
            ['blob_id' =>$b],
        );
    }

    /**
     * Remove the specified project from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            return redirect()->route('projects.project.index')
                             ->with('success_message', 'Project was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request']);
        }
    }
    
    /**
     * Validate the given request with the defined rules.
     *
     * @param  Illuminate\Http\Request  $request
     *
     * @return boolean
     */
    protected function affirm(Request $request)
    {
        return $this->validate($request, [
            'name' => 'string|min:1|nullable',
            'company_name' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'status' => 'string|min:1|nullable',
            'creator' => 'required',
            'user_id' => 'required',
            'email' => 'email|required',
            'team_leader' => 'string|min:1|required',
            'priority' => 'string|min:1|nullable',
            'phone_number' => 'string|min:1|max:16|digits:10',
            'blob_id.*' => 'nullable|file|max:5000|mime:jpeg,jpg,png,svg,txt,gif,pdf,doc,docx,',
                
        ]);
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function fileUpload(Request $request)
    {
        $data =  $request->all();
        // dd($_FILES);
        if ($request->hasFile('blob_id')) {
             $file = $request->file('blob_id');
             $creator = 'created_by'.' - '. Auth::user()->name;
             $user_id = Auth::user()->id;
             $created_by = 'user_id'.' - '.$user_id;
             $extension = $file->getClientOriginalExtension(); // you can also use file name
             $fileName = time().'.'.$extension;
             $path = public_path().'/storage/blob/'.$creator. ', '. 
             $created_by;
             $upload = $file->move($path,$fileName);

            if ($_FILES['blob_id']['error'] == 0 ) {

                return Blobs::create([
                        'name' => $_FILES['blob_id']['name'], 
                        'mime_type'=> $_FILES['blob_id']['type'], 
                        'url'=> $fileName, 
                        'size' => $_FILES['blob_id']['size'], 
                        'user_id'=> $user_id,
                     ]);
                
             }

        }
       
    }

    public function getData(Request $request)
    {
        $data['blob_id'] = !empty($request->allFiles('blob_id')) ? str_replace('blob', '', $_FILES["blob_id"]["name"]) : $request->blob_id;

        $data['name'] = !empty($request->input('name')) ? $request->input('name') : null;

        $data['company_name'] = !empty($request->input('company_name')) ? $request->input('company_name') : null;

        $data['description'] = !empty($request->input('description')) ? $request->input('description') : null;

        $data['status'] = !empty($request->input('status')) ? $request->input('status') : null;

        $data['user_id'] = !empty($request->input('user_id')) ? $request->input('user_id') : null;


        $data['creator'] = !empty($request->input('creator')) ? $request->input('creator') : null;

        $data['assigned_to'] = !is_null($request->input('team_leader')) ? $request->input('team_leader') : null;

        $data['priority'] = !empty($request->input('priority')) ? $request->input('priority') : null;

        $data['email'] = !empty($request->input('email')) ? $request->input('email') : null;

        $data['phone_number'] = !empty($request->input('phone_number')) ? $request->input('phone_number') : null;

        return $data;
    }

}