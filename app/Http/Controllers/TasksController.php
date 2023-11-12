<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the number of projects from your database
        $plannedTasks = tasks::where('status', 'planned')
            ->with('phases.projects')
            ->get();

        $inProgressTasks = tasks::where('status', 'in progress')
            ->with('phases.projects')
            ->get();

        $completedTasks = tasks::where('status', 'completed')
            ->with('phases.projects')
            ->get();

        $pageTitle = "Tasks";

        return view('pages.taskboard', compact('plannedTasks', 'inProgressTasks', 'completedTasks', 'pageTitle'));
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
        // Define your validation rules
        $rules = [
            'task' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'phase' => 'required|exists:phases,id',
            'order' => 'string',
            'image' => 'string',
            'file' => 'file|mimes:pdf,doc,docx',
            'deadline' => 'nullable|max:100|date',
            'status' => 'required|max:255|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the file in the "app/storage/public/status" folder
            $file->storeAs('public/status', $filename);
            // Update the "file" field in your database with the stored file path
        } else {
            $file = null;
        }
        $image = null;
        $order = 1;
        $task = tasks::create([
            'task' => $request['task'],
            'description' => $request['description'],
            'phases_id' => $request['phase'],
            'order' => $order,
            'image' => $image,
            'file' => $file,
            'deadline' => $request['deadline'],
            'status' => $request['status'],
        ]);
        // Redirect back or to a success page
        return response()->json(['success' => true, 'message' => 'Task added succesfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = tasks::find($id);
        return response()->json($task);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = tasks::find($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = tasks::find($id);
        if ($task !== null) {
            // Define your validation rules
            $rules = [
                'task' => 'required|max:255|string',
                'description' => 'required|max:255|string',
                'phase' => 'required|exists:phases,id',
                'order' => 'string',
                'image' => 'string',
                'file' => 'file|mimes:pdf,doc,docx',
                'deadline' => 'nullable|max:100|date',
                'status' => 'required|max:255|string',
            ];

            // Create a validator instance with your data and rules
            $validator = Validator::make($request->all(), $rules);

            // Check if the validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();

                // Store the file in the "app/storage/public/status" folder
                $file->storeAs('public/status', $filename);
                // Update the "file" field in your database with the stored file path
            } else {
                $file = null;
            }
            $image = null;
            $order = 1;
            $task = tasks::update([
                'task' => $request['task'],
                'description' => $request['description'],
                'phases_id' => $request['phase'],
                'order' => $order,
                'image' => $image,
                'file' => $file,
                'deadline' => $request['deadline'],
                'status' => $request['status'],
            ]);
            // Redirect back or to a success page
            return response()->json(['success' => true, 'message' => 'Task added succesfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Task anot found!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}