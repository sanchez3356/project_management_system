<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;
use App\Models\profiles;
use App\Models\inbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $profile = profiles::where('email', $user->email)->first();

        // Retrieve the inbox from the database
        $inbox = inbox::all(); // Assuming "inbox" is your Eloquent model
        $pageTitle = 'Profile';

        // You can pass both the project types and project count to the view
        return view('pages.profile', compact('inbox', 'profile', 'pageTitle'));
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
        //
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