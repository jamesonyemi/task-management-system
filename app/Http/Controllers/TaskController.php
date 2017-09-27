<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
        {
            $tasks = Task::latest()->paginate(10);
            return view('tasks.index',compact('tasks'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('tasks.create');
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
               'assigned_by' => 'required',
               // 'date_fixed' => 'required',
               // 'issue_title'  => 'required',
               // 'date_opened' => 'required',
               // 'priority' => 'required',
               // 'status' => 'required',
               // 'description' => 'required',
               // 'note' => 'required',
               // 'phone_number' => 'required',
               // 'assignee' => 'required',
               // 'project_name' => 'required',
               // 'employee_name' => 'required',
               // 'first_name' => 'required',
               // 'last_name' => 'required',
               // 'blob' => 'required',
            ]);
           Task::create($request->all());
            return redirect()->route('tasks.index')
                            ->with('success','Task created successfully');
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show(Task $task)
        {
            return view('tasks.show',compact('task'));
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(Task $task)
        {
            return view('tasks.edit',compact('task'));
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request,Task $task)
        {
            request()->validate([
                'first_name' => 'required',
                'email' => 'required',
            ]);
            $task->update($request->all());
            return redirect()->route('tasks.index')
                            ->with('success','Task updated successfully');
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Task::destroy($id);
            return redirect()->route('tasks.index')
                            ->with('success','Task deleted successfully');
        }

}
