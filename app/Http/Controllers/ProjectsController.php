<?php

namespace App\Http\Controllers;

use App\Models\phases;
use App\Models\projects;
use App\Models\project_types;
use App\Models\clients;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the number of projects from your database
        $projects = projects::with('clients', 'phases.tasks')->get(); // Assuming "projects" is your Eloquent model

        // Retrieve the project types from the database
        $projectTypes = project_types::all(); // Assuming "project_types" is your Eloquent model

        // Retrieve the clients from the database
        $pageTitle = "Projects";

        // You can pass both the project types and project count to the view
        return view('pages.projects-list', compact('projectTypes', 'projects', 'pageTitle'));
    }
    public function grid()
    {
        // Show the form for creating a new project (projects-grid.blade.php).
        // Retrieve the number of projects from your database
        $projects = projects::with('clients', 'phases.tasks')->get(); // Assuming "projects" is your Eloquent model
        $projectCount = Projects::count(); // Assuming "Projects" is your Eloquent model

        // Retrieve the project types from the database
        $projectTypes = project_types::all(); // Assuming "projects_types" is your Eloquent model

        // Retrieve the clients from the database
        $clients = clients::all(); // Assuming "clients" is your Eloquent model
        $pageTitle = "Projects";

        // You can pass both the project types and project count to the view
        return view('pages.projects-grid', compact('projectTypes', 'projectCount', 'clients', 'projects', 'pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve the number of projects from your database
        $projectCount = Projects::count(); // Assuming "Project" is your Eloquent model

        // Retrieve the project types from the database
        $projectTypes = project_types::all(); // Assuming "ProjectType" is your Eloquent model

        // Retrieve the clients from the database
        $clients = clients::all(); // Assuming "clients" is your Eloquent model
        $pageTitle = "ProjectsAdd";

        // You can pass both the project types and project count to the view
        return view('pages.projects-add', compact('projectTypes', 'projectCount', 'clients', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define your validation rules
        $rules = [
            'project_title' => 'required|max:255|unique:projects',
            'client' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'project_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_description' => 'required',
            'project_type' => 'required',
            'priority' => 'required',
            'rate' => 'numeric',
        ];
        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hasFile('project_image')) {
            $imagePath = $request->file('project_image')->store('public/projects');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = "images/no-image.png";
        }
        $project = projects::create([
            'project_title' => $request['project_title'],
            'project_type' => $request['email'],
            'created_by' => Auth::user()->id,
            'client' => $request['client'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'project_image' => $imagePath,
            'project_description' => $request['project_description'],
            'priority' => $request['priority'],
            'rate' => $request['rate'],
        ]);
        // Get the ID of the created project
        $projectId = $project->id;
        // Define an array of phase names
        $phaseNames = [
            'Formation Phase',
            'Requirement/Planning Phase',
            'Design Phase',
            'Development Phase',
            'Testing Phase',
            'Release Phase',
            'Maintenance Phase',
        ];


        // Create the phases for the project with one-day duration
        foreach ($phaseNames as $phaseName) {
            phases::create([
                'projects_id' => $projectId,
                'phase' => $phaseName,
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'status' => 'Pending',
            ]);
        }

        return redirect()->back()->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the project with its related phases and tasks
        $project = Projects::with('phases.tasks')->find($id);
        $progress = project_progress($project);

        if ($project) {
            $client = Clients::find($project->client_id);

            // Now you have the project, its related phases, and tasks
            $pageTitle = "ProjectsDetails";

            return view('pages.projects-details', compact('project', 'client', 'pageTitle', 'progress'));
        } else {
            // Handle the case where no project is found with the given ID
            return redirect()->back()->with('success', 'Project not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Use the $id variable to retrieve the project with the specific ID
        $project = Projects::with('phases.tasks')->find($id);
        $projectCount = Projects::count(); // Assuming "Project" is your Eloquent model
        $projectTypes = project_types::get(); // Assuming "ProjectType" is your Eloquent model
        $clients = clients::get(); // Assuming "clients" is your Eloquent model
        if ($project) {
            // Get the client whose ID matches the 'client' column in the project row
            $client = clients::find($project->client);
            // Now you have the project, its tasks, and its client
            $pageTitle = "ProjectsAdd";

            return view('pages.projects-add', compact('project', 'clients', 'projectTypes', 'client', 'projectCount', 'pageTitle'));

        } else {
            // Handle the case where no project is found with the given ID
            return redirect()->back()->with('error', 'Project not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = projects::find($id);
        if ($project) {
            // Define your validation rules
            $rules = [
                'project_title' => 'required|max:255|unique:projects',
                'client' => 'required|numeric|exists:clients,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'project_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'project_image' => 'image|max:2048',
                'project_description' => 'required',
                'project_type' => 'required|numeric|exists:project_types,id',
                'priority' => 'required',
                'rate' => 'numeric',
            ];

            // Create a validator instance with your data and rules
            $validator = Validator::make($request->all(), $rules);

            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('project_image')) {
                $imagePath = $request->file('project_image')->store('public/projects');
            } else {
                $imagePath = "images/no-image.png";
            }

            $project->update([
                'project_title' => $request['project_title'],
                'project_type' => $request['project_type'],
                'created_by' => Auth::user()->id,
                'client' => $request['client'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'project_image' => $imagePath,
                'project_description' => $request['project_description'],
                'priority' => $request['priority'],
                'rate' => $request['rate'],
                // Update other attributes as needed
            ]);
            // Redirect back or to a success page
            return redirect()->route('projects.index')->with('success', 'Project Updated successfully');

        } else {
            // Handle the case where no project is found with the given ID
            return redirect()->back()->with('error', 'Project not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = projects::find($id);

        if (!$project) {
            // Project not found
            return response()->json(['message' => 'Project not found'], 404);
        }

        // Attempt to delete the project
        try {
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the project'], 500);
        }
    }
}