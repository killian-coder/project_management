<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Milestone;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function showProject()
    {

        $projects  =  Project::all();

        // dd($projects);


        return view('projects.showProjects', compact('projects'));
    }

    function deleteProject($id) {

        $project =  Project::destroy($id);

       

      return redirect()->route('showProject')->with('sucesss', 'successefully deleted a project');
        
    }




    function createProject() {

        return view('projects.createproject');
        
    }


    public function storeProject(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'project_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required',
            
        ]);

        // Create a new project
        $project = new Project();
        $project->project_name = $request->input('project_name');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->description = $request->input('description');
        $project->status = 'open';
        $project->save();

        // return response()->json(['message' => 'Project created successfully', 'project' => $project], 201);
        return view('projects.showProjects')->with(['message' => 'Project created successfully', 'project' => $project], 201);
    }

    public function createTask(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'project_id' => 'required|exists:projects,project_id',
            'task_name' => 'required',
            'description' => 'required',
            'assigned_to' => 'required|exists:users,user_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required',
        ]);

        // Create a new task
        $task = new Task();
        $task->project_id = $request->input('project_id');
        $task->task_name = $request->input('task_name');
        $task->description = $request->input('description');
        $task->assigned_to = $request->input('assigned_to');
        $task->start_date = $request->input('start_date');
        $task->end_date = $request->input('end_date');
        $task->status = $request->input('status');
        $task->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function createMilestone(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'task_id' => 'required|exists:tasks,task_id',
            'milestone_name' => 'required',
            'description' => 'required',
            'target_date' => 'required|date',
            'status' => 'required',
        ]);

        // Create a new milestone
        $milestone = new Milestone();
        $milestone->task_id = $request->input('task_id');
        $milestone->milestone_name = $request->input('milestone_name');
        $milestone->description = $request->input('description');
        $milestone->target_date = $request->input('target_date');
        $milestone->status = $request->input('status');
        $milestone->save();

        return response()->json(['message' => 'Milestone created successfully', 'milestone' => $milestone], 201);
    }

    function viewProjectItem($id) {
        
        return view('projects.viewProjectItem');
    }
}
