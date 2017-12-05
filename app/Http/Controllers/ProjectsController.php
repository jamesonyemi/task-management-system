<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Ticketing;
use App\User;
use App\Blobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketingController;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the projects.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        // $projects = Project::with('assignedby')->paginate(25);
         $projects = Project::latest()->paginate(25);
              return view('projects.index',compact('projects'))
                  ->with('p', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new project.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $assignedBies =  Ticketing::pluck('assigned_by','id')->all();
           $assigned_to  =  User::pluck('name','id')->all();
        return view('projects.create', compact('assignedBies','assigned_to'));
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
            $data = $this->getData($request);
              $file = $request->file('blob_id');
               $blob = $file->getClientOriginalName();
                $saveBlob = Blobs::create(['name'=>$blob]);

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
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $assigned_to = User::pluck('name','id')->all();

        return view('projects.edit', compact('project','assigned_to'));
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
            $data = $this->getData($request);
            
            $project = Project::findOrFail($id);
            $project->update($data);

            return redirect()->route('projects.project.index')
                             ->with('success_message', 'Project was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request']);
        }        
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
            'assigned_to' => 'string|min:1|required',
            'priority' => 'string|min:1|nullable',
            'phone_number' => 'string|min:1|max:16|digits:10',
                
        ]);
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $data =  $request->all();


        $data['name'] = !empty($request->input('name')) ? $request->input('name') : null;
        $data['company_name'] = !empty($request->input('company_name')) ? $request->input('company_name') : null;
        $data['description'] = !empty($request->input('description')) ? $request->input('description') : null;
        $data['status'] = !empty($request->input('status')) ? $request->input('status') : null;
        $data['user_id'] = !empty($request->input('user_id')) ? $request->input('user_id') : null;
        $data['blob_id'] = !empty($request->file('blob_id')->store('blob')) ? str_replace('blob', '', $request->file('blob_id')->store('blob')) : null;
        $data['creator'] = !empty($request->input('creator')) ? $request->input('creator') : null;
        $data['assigned_to'] = !empty($request->input('assigned_to')) ? $request->input('assigned_to') : null;
        $data['priority'] = !empty($request->input('priority')) ? $request->input('priority') : null;
        $data['email'] = !empty($request->input('email')) ? $request->input('email') : null;
        $data['phone_number'] = !empty($request->input('phone_number')) ? $request->input('phone_number') : null;

        return $data;
    }

}