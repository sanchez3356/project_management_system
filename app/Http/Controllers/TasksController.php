<?php

namespace App\Http\Controllers;

use App\Models\tasks;
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
        // Retrieve the inbox from the database
        $tasks = tasks::all(); // Assuming "inbox" is your Eloquent model
        $taskCount = tasks::count(); // Assuming "inbox" is your Eloquent model
        $pageTitle = "Tasks";


        // You can pass both the project types and project count to the view
        return view('pages.taskboard', compact('tasks', 'taskCount', 'pageTitle'));
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
            'phase' => 'required|exists:phases,id', // Check if the "phase" exists in the "phases" table
            'order' => 'string',
            'image' => 'string',
            'file' => 'file|mimes:pdf,doc,docx',
            'deadline' => 'nullable|max:100|date',
            'status' => 'required|max:255|string', // "status" should be a string
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
        
            // Store the file in the "app/storage/public/status" folder
            $file->storeAs('public/status', $filename);
            // Update the "file" field in your database with the stored file path
        }
        $image = null;
        $task = tasks::create([
            'task' => $request['task'],
            'description' => $request['description'],
            'phases_id' => $request['phase'],
            'order' => $request['task_description'],
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
        //
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