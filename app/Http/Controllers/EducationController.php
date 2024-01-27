<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\education;

class EducationController extends Controller
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
            'school' => 'required|string|max:100',
            'qualification' => 'required|string|max:100',
            'from' => 'required|date',
            'to' => 'nullable|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $education = education::create([
            'school' => $request->input('school'),
            'qualification' => $request->input('qualification'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'profile_id' => $request->input('profile'),
            // other columns...
        ]);

        // DB::connection('portfolio_db')->table('education')->insert([
        // ]);

        return response()->json(['success' => true, 'message' => 'Education record added succesfully']);
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
        $education = DB::connection('portfolio_db')->table('education')->find($id);

        if (!$education) {
            // Education record not found
            return response()->json(['message' => 'Education record not found'], 404);
        }

        // Attempt to delete the Education record
        try {
            DB::connection('portfolio_db')->table('education')->where('id', $id)->delete();
            return response()->json(['message' => 'Education record deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the Education record'], 500);
        }
    }
}