<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\project;
use App\Models\projects;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = DB::connection('portfolio_db')->table('projects')->get();
        $projects = project::join('project_types', 'project_types.id', '=', 'projects.project_type')->get();
        $projectsCount = DB::connection('portfolio_db')->table('projects')->count();
        $types = DB::connection('portfolio_db')->table('project_types')->get();
        $pageTitle = "Portfolio";

        // You can pass both the emails and emails count to the view
        return view('portfolio.portfolio', compact('projects', 'projectsCount', 'pageTitle', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'project' => 'required|string|max:255|unique:projects',
            'image' => 'required|string',
            'description' => 'required|string',
            'project_type' => 'required|numeric|max:100|exists:project_types,id',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $project = project::create([
            'project_name' => $request->input('project'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
            'project_type' => $request->input('project_type'),
        ]);

        return response()->json(['success' => true, 'message' => 'Project successfully added to your portfolio']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the project with its related phases and tasks
        $project = Projects::join('project_types', 'projects.id', '=', 'project_types.id')->find($id);

        return response()->json($project);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}