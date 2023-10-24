<?php

namespace App\Http\Controllers;

use App\Models\phases;
use App\Models\projects;
use App\Models\project_types;
use App\Models\clients;
use App\Models\accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
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
            'account' => 'required|max:100',
            'balance' => 'numeric',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $account = new accounts();
        $account->user_id = Auth::user()->id;
        $account->account_name = $request->input('account');
        $account->initial_balance = $request->input('balance');
        $account->final_balance = $request->input('balance');
        $account->save();

        return response()->json(['success' => true]);    }

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
            'account' => 'required|max:100',
            'balance' => 'numeric',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $account = accounts::find($id);
        if ($account) {
            $account->account_name = $request->input('account');
            $account->final_balance = $request->input('balance');
            $account->save();
        }
        return response()->json(['success' => true]);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = accounts::find($id);

        if (!$account) {
            // Project not found
            return response()->json(['message' => 'Account not found'], 404);
        }

        // Attempt to delete the project
        try {
            $account->delete();
            return response()->json(['message' => 'Account deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the account'], 500);
        }
    }
}