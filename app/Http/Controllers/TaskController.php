<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

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
                'name' => 'required',
                'email' => 'required',
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
                'name' => 'required',
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
