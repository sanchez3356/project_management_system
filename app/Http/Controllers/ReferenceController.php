<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\references;


class ReferenceController extends Controller
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
            'names' => 'required|string|max:100',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'title' => 'required|string|max:100',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $reference = references::create([
            'names' => $request->input('names'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'profile_id' => $request->input('profile'),
            // other columns...
        ]);

        return response()->json(['success' => true, 'message' => 'References added succesfully']);
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
        $reference = DB::connection('portfolio_db')->table('references')->find($id);

        if (!$reference) {
            // Phase not found
            return response()->json(['message' => 'Reference record not found'], 404);
        }

        // Attempt to delete the Phase
        try {
            DB::connection('portfolio_db')->table('references')->where('id', $id)->delete();
            return response()->json(['message' => 'Reference record deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the reference record'], 500);
        }
    }
}