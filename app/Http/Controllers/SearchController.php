<?php

namespace App\Http\Controllers;

use App\Models\profiles;
use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\accounts;
use App\Models\clients;
use App\Models\User;
use App\Models\transactions;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('username', 'like', "%$query%")->get();
        $clients = clients::where('username', 'like', "%$query%")->get();
        $projects = projects::where('project_title', 'like', "%$query%")
            ->orWhere('project_description', 'like', "%$query%")
            ->get();
        $profiles = profiles::where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->orWhere('bio', 'like', "%$query%")
            ->get();
        // Repeat the same pattern for other tables and columns
        $results = [];

        // Format data from the 'users' table
        foreach ($users as $user) {
            $results[] = [
                'type' => 'User',
                'name' => $user->username,
                'data' => $user->email,
                // Add other fields as needed
            ];
        }
        foreach ($clients as $client) {
            $results[] = [
                'type' => 'Client',
                'name' => $client->username,
                'data' => $client->email,
                // Add other fields as needed
            ];
        }

        // Format data from the 'projects' table
        foreach ($projects as $project) {
            $results[] = [
                'type' => 'Project',
                'name' => $project->project_title,
                'data' => $project->project_description,
                // Add other fields as needed
            ];
        }
        foreach ($profiles as $profile) {
            $results[] = [
                'type' => 'Project',
                'name' => $profile->first_name + ' ' + $profile->last_name,
                'data' => $profile->bio,
                // Add other fields as needed
            ];
        }

        return response()->json(['results' => $results]);
    }
}