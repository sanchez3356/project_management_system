<?php

namespace App\Http\Controllers;

use App\Models\profiles;
use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\clients;
use App\Models\project_types;
use App\Models\inbox;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = projects::with('clients','phases.tasks')->get(); // Assuming you have a "projects" model
        $projectCount = Projects::count(); // Assuming "Project" is your Eloquent model
        $completed = calculateProjectsCompletionPercentage($projects);
        // Retrieve the project types from the database
        $projectTypes = project_types::get(); // Assuming "ProjectType" is your Eloquent model


        // Retrieve the clients from the database
        $clients = clients::get(); // Assuming "clients" is your Eloquent model
        $clientsCount = clients::count(); // Assuming "clients" is your Eloquent model

        // // Retrieve the inbox from the database
        $inbox = inbox::get(); // Assuming "inbox" is your Eloquent model
        $inboxCount = inbox::count(); // Assuming "inbox" is your Eloquent model
        $pageTitle = "Home";

        // You can pass both the project types and project count to the view
        return view('pages.home', compact('projects', 'projectCount', 'clients', 'clientsCount', 'inbox', 'inboxCount', 'projectTypes', 'pageTitle', 'completed'));
    }
}