<?php

namespace App\Http\Controllers;

use App\Models\phases;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'project_id' => 'required|numeric',
            'phase' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $phase = new phases();
        $phase->projects_id = $request->input('project_id');
        $phase->phase = $request->input('phase');
        $phase->start_date = $request->input('start_date');
        $phase->end_date = $request->input('end_date');
        $phase->status = 'pending';
        // Set other project properties
        $phase->save();

        return response()->json(['success' => true, 'message' => 'Phase added succesfully']);
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
        $rules = [
            'projects_id' => 'required|numeric|numeric|exists:projects,id',
            'phase' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $phase = phases::find($id);
        if (!$phase) {
            // Phase not found
            return response()->json(['message' => 'Phase not found'], 404);
        }
        $phase->update([
            'projects_id' => $request['projects_id'],
            'phase' => $request['phase'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            // Update other attributes as needed
        ]);

        return response()->json(['success' => true, 'message' => 'Phase updated succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phase = phases::find($id);

        if (!$phase) {
            // Phase not found
            return response()->json(['message' => 'Phase not found'], 404);
        }

        // Attempt to delete the Phase
        try {
            $phase->delete();
            return response()->json(['message' => 'Phase deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the Phase'], 500);
        }
    }
}