<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Ticketing;
use App\User;
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
        $projects = Project::with('assignedby')->paginate(25);
        // $project = User::with('assignedby')->findOrFail($id);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $assignedBies =  Ticketing::pluck('assigned_by','id')->all();
           $assign_to  =  User::pluck('name','id')->all();
        return view('projects.create', compact('assignedBies','assign_to'));
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
            
            Project::create($data);

            return redirect()->route('projects.project.index')
                             ->with('success_message', 'Project was successfully added!');

        } catch (Exception $exception) {

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
        $assignedBies = Ticketing::pluck('id','id')->all();

        return view('projects.edit', compact('project','assignedBies'));
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
            'project_name' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'status' => 'string|min:1|nullable',
            'assigned_by' => 'required',
            'assignee' => 'string|min:1|nullable',
            'priority' => 'string|min:1|nullable',
            'watchers' => 'string|min:1|nullable',
                
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


        $data['project_name'] = !empty($request->input('project_name')) ? $request->input('project_name') : null;
        $data['description'] = !empty($request->input('description')) ? $request->input('description') : null;
        $data['status'] = !empty($request->input('status')) ? $request->input('status') : null;
        $data['assignee'] = !empty($request->input('assignee')) ? $request->input('assignee') : null;
        $data['priority'] = !empty($request->input('priority')) ? $request->input('priority') : null;
        $data['watchers'] = !empty($request->input('watchers')) ? $request->input('watchers') : null;

        return $data;
    }

}