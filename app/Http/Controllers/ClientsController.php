<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\projects;
use App\Models\project_types;
use App\Models\clients;
use App\Models\profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    protected $profiles;

    public function __construct(profiles $profiles)
    {
        $this->profiles = $profiles;

        // Apply middleware to all methods in this controller
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the number of projects from your database
        $projectCount = Projects::count(); // Assuming "Project" is your Eloquent model
        $project = Projects::all(); // Assuming "Project" is your Eloquent model

        // Retrieve the project types from the database
        $projectTypes = project_types::all(); // Assuming "ProjectType" is your Eloquent model

        // Retrieve the clients from the database
        $clients = clients::all(); // Assuming "clients" is your Eloquent model
        $pageTitle = "Clients";

        // You can pass both the project types and project count to the view
        return view('pages.clients', compact('projectTypes', 'project', 'projectCount', 'clients', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve the number of projects from your database
        $projectCount = Projects::count(); // Assuming "Project" is your Eloquent model
        $projects = Projects::all(); // Assuming "Project" is your Eloquent model

        // Retrieve the project types from the database
        $projectTypes = project_types::all(); // Assuming "ProjectType" is your Eloquent model

        // Retrieve the clients from the database
        $clients = clients::all(); // Assuming "clients" is your Eloquent model
        $pageTitle = "ClientsAdd";

        // You can pass both the project types and project count to the view
        return view('pages.clients-add', compact('projectTypes', 'projects', 'projectCount', 'clients', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define your validation rules
        $rules = [
            'id' => 'numeric',
            'first_name' => 'required|max:100|string',
            'last_name' => 'required|max:100|string',
            'email' => 'required|string|email|max:255|unique:clients',
            'username' => 'required|max:35|string',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|max:100|string',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'avatar' => 'required|max:2048',
            'address' => 'required|max:100|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('public/avatars');
            $imagePath = str_replace('public/', '', $imagePath);
        } else {
            $imagePath = "avatars/male.png'";
        }

        $client = clients::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'avatar' => $imagePath,
            'created_by' => Auth::user()->id,
        ]);


        $profile = profiles::create([
            'email' => $client->email,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        // Redirect back or to a success page
        return redirect()->route('clients.create')->with('success', 'Client added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = clients::find($id);
        if ($client) {
            // Get the project whose ID matches the 'client' column in the project row
            $project = projects::find($client->$id);
            $profile = profiles::where('email', $client->email)->first();

            // Now you have the project, its tasks, and its client
            $pageTitle = "Clients";

            return view('pages.clients-details', compact('client', 'project', 'pageTitle', 'profile'));

        } else {
            $pageTitle = "ClientProfile";
            // Handle the case where no project is found with the given ID
            return view('pages.clients', compact('pageTitle'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = clients::find($id);
        if ($client) {
            // Get the project whose ID matches the 'client' column in the project row
            $project = projects::find($id);
            $profile = profiles::where('email', $client->email)->first();

            // Now you have the project, its tasks, and its client
            $pageTitle = "ClientsAdd";

            return view('pages.clients-add', compact('project', 'client', 'profile', 'id', 'pageTitle'));

        } else {
            // Handle the case where no project is found with the given ID
            return view('pages.clients', compact('pageTitle'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = clients::find($id);
        $profile = profiles::where('email', $client->email)->first();
        if (!$profile) {
            return redirect()->route('clients.create')->with('error', 'Clients profile not found!');
        }
        if ($client) {
            // Define your validation rules
            $rules = [
                'first_name' => 'required|max:255|string',
                'last_name' => 'required|max:255|string',
                'email' => 'required|string|email|max:255',
                'username' => 'required|max:100|string',
                'password' => 'required|string|min:8',
                'phone' => 'nullable|max:100|string',
                'client_id' => 'required|max:100|string',
                'address' => 'required|max:100|string',
            ];

            // Create a validator instance with your data and rules
            $validator = Validator::make($request->all(), $rules);

            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $client->update([
                'username' => $request['username'],
                'email' => $request['email'],
                'client_title' => $request['client_title'],
                // Update other attributes as needed
            ]);
            $profile->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'address' => $request['address'],
                'phone' => $request['phone'],
                // Update other attributes as needed
            ]);
            // Redirect back or to a success page
            return redirect()->route('clients.index')->with('success', 'Client Updated successfully');

        } else {
            // Handle the case where no project is found with the given ID
            return redirect()->route('clients.create')->with('error', 'Client not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = clients::find($id);

        if (!$client) {
            // Project not found
            return response()->json(['message' => 'Client not found'], 404);
        }

        // Attempt to delete the project
        try {
            $client->delete();
            return response()->json(['message' => 'Client deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the client record'], 500);
        }
    }
}