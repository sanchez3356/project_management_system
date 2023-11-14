<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\messages;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $messages = DB::connection('portfolio_db')->table('messages')->paginate(50);
        $messageCount = DB::connection('portfolio_db')->table('messages')->count();
        $pageTitle = "Inbox";

        // You can pass both the messages and messages count to the view
        return view('pages.inbox', compact('messages', 'messageCount', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Inbox';
        
        return view('pages.compose', compact('pageTitle'));

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
        $message = DB::connection('portfolio_db')->table('messages')->find($id);
        
        $data = [
            'id' => $message->id,
            'email' => $message->email,
            'phone' => $message->phone,
            'subject' => $message->subject,
            'message' => $message->message,
            'sent' => $message->created_at,
        ];
    
        return view('partials.email', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Inbox';
        $message = DB::connection('portfolio_db')->table('messages')->find($id);
        
        return view('pages.compose', compact('message', 'pageTitle'));
    }
    /**
     * Show the form for forwarding the specified resource.
     */
    public function forward(string $id)
    {
        $pageTitle = 'Inbox';
        $message = DB::connection('portfolio_db')->table('messages')->find($id);
        
        return view('pages.compose', compact('message', 'pageTitle'));
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
        $message = DB::connection('portfolio_db')->table('messages')->find($id);

        if (!$message) {
            // Phase not found
            return response()->json(['message' => 'Message not found'], 404);
        }

        // Attempt to delete the Phase
        try {
            $message->delete();
            return response()->json(['message' => 'Message deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the transaction Message'], 500);
        }

    }
}