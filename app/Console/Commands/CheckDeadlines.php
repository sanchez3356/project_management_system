<?php

namespace App\Console\Commands;
use App\Models\notifications;
use App\Models\tasks;
use App\Models\projects;
use App\Models\phases;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CheckDeadlines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-deadlines';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = Auth::user();
       // Implement logic to check deadlines and create notifications
        // Example:
        $overdueTasks = tasks::where('deadline', '<', now())->get();
        $overdueProjects = projects::where('end_date', '<', now()->toDateString())->get();
        $duePhases = phases::whereDate('start_date', '=', now()->toDateString())->get();

        // Loop through $overdueTasks and $overdueProjects, create notifications
        foreach ($overdueTasks as $task) {
            notifications::create([
                'user_id' => $user->id,
                'notification' => "Tasks",
                'message' => "Task '{$task->task}' is overdue!",
                'type' => "error",
                'icon' => "fa fa-calendar",
            ]);
        }

        foreach ($overdueProjects as $project) {
            notifications::create([
                'user_id' => $user->id,
                'notification' => "Projects",
                'message' => "Project '{$project->project_title}' is overdue!",
                'type' => "error",
                'icon' => "fas fa-briefcase",
            ]);
        }
        
        foreach ($duePhases as $phase) {
            notifications::create([
                'user_id' => $user->id,
                'notification' => "Project phases",
                'message' => "Phase '{$phase->phase}' is due today!",
                'type' => "warning",
                'icon' => "fas fa-moon",
            ]);
        }
    }
}