<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inbox;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the inbox from the database
        $inbox = inbox::all(); // Assuming "inbox" is your Eloquent model
        $inboxCount = inbox::count(); // Assuming "inbox" is your Eloquent model
        $pageTitle = "Inbox";


        // You can pass both the project types and project count to the view
        return view('pages.inbox', compact('inbox', 'inboxCount', 'pageTitle'));
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