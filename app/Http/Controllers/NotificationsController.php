<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = notifications::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('partials.notification', ['notifications' => $notifications]);

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
        $notification = new notifications();
        $notification->user_id = auth()->id(); // Assuming you're using Laravel authentication
        $notification->message = 'Task deadline is approaching!';
        $notification->icon = 'Task deadline is approaching!';
        $notification->type = 'error';
        $notification->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();

                // Check if the user and profile records match the ones in the portfolio_db
                $matchingRecords = DB::connection('portfolio_db')
                ->table('users')
                ->where('users.id', '=', $user->id)
                ->join('profiles', 'users.id', '=', 'profiles.profileable_id')
                ->where('profiles.email', '=', $user->email)
                ->where('username', '=', $user->username)
                ->count();
    
                if ($matchingRecords > 0) {
                    // User and profile records match, create the notification
                    $notificationDetails = [
                        'user_id' => $user->id,
                        'notification' => "Portfolio",
                        'message' => "You have a portfolio user and profile for: '{$user->username}'",
                        'type' => "success",
                        'icon' => "fa fa-user",
                    ];
                } else {
                    $notificationDetails = [
                        'user_id' => $user->id,
                        'notification' => "Portfolio",
                        'message' => "You do not have a portfolio user and profile for: '{$user->username}'",
                        'type' => "error",
                        'icon' => "fa fa-user",
                    ];
                }
            
        // Check if a similar notification already exists
        $existingNotification = notifications::where($notificationDetails)->first();
    
        if (!$existingNotification) {
            // Notification does not exist, create it
            notifications::create($notificationDetails);
        } else {
            // Notification already exists, you can handle this case if needed
            exit;
        }
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