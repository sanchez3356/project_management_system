<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\careers;


class CareerController extends Controller
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
            'profile' => 'required|numeric|max:100',
            'company' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'from' => 'required|date',
            'to' => 'required|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $career = careers::create([
            'job_title' => $request->input('title'),
            'company' => $request->input('company'),
            'location' => $request->input('location'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'profile_id' => $request->input('profile'),
        ]);

        return response()->json(['success' => true, 'message' => 'Career record added succesfully']);
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
        $career = DB::connection('portfolio_db')->table('careers')->find($id);

        if (!$career) {
            // Phase not found
            return response()->json(['message' => 'Career record not found'], 404);
        }

        // Attempt to delete the Phase
        try {
            DB::connection('portfolio_db')->table('careers')->where('id', $id)->delete();
            return response()->json(['message' => 'Career record deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the Career record'], 500);
        }
    }
}