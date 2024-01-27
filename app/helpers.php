<?php

use App\Models\clients;
use App\Models\projects;
use App\Models\User;
use App\Models\profiles;
use App\Models\tasks;
use Carbon\Carbon;


function formatMyDate($dateString)
{
    $carbonDate = Carbon::parse($dateString);
    return $carbonDate->format('d M, Y');
}

function when($date)
{
    $now = new DateTime();
    $date = new DateTime($date);
    $interval = $now->diff($date);

    if ($interval->y > 0 || $interval->m > 0 || $interval->d > 1) {
        // More than 1 day ago, show in a different format (e.g., "dd-mm-yy")
        return $date->format('d-m-y');
    } elseif ($interval->d > 0) {
        // Less than 1 day but more than 0 days, show as "yesterday"
        return 'yesterday';
    } elseif ($interval->h > 0) {
        // Less than 1 day but more than 0 hours, show as "X hours ago"
        return $interval->h . ' hours ago';
    } elseif ($interval->i > 0) {
        // Less than 1 hour but more than 0 minutes, show as "X minutes ago"
        return $interval->i . ' minutes ago';
    } else {
        // Less than 1 minute, show as "just now"
        return 'just now';
    }
}

if (!function_exists('profile_progress')) {
    function profile_progress($user)
    {
        // Define the fields that indicate profile completion
        $userFieldsToCheck = ['name', 'email', 'avatar'];
        $profilesFieldsToNotCheck = ['id', 'created_at', 'updated_at'];

        // Calculate user profile progress
        $userProgress = 0;
        $totalUserFields = count($userFieldsToCheck);

        foreach ($userFieldsToCheck as $field) {
            if (!empty($user->$field)) {
                $userProgress += 1;
            }
        }

        // Calculate profiles progress
        $profileProgress = 0;
        $profileAttributes = $user->profile->getAttributes(); // Get all profile attributes

        $totalProfileFields = count($profileAttributes) - count($profilesFieldsToNotCheck);

        foreach ($profileAttributes as $field => $value) {
            if (!in_array($field, $profilesFieldsToNotCheck) && !empty($value)) {
                $profileProgress += 1;
            }
        }

        // Calculate the total progress for both profiles as a percentage
        $totalProgress = (($userProgress + $profileProgress) / ($totalUserFields + $totalProfileFields)) * 100;

        return $totalProgress;
    }
}

if (!function_exists('calculateProjectsCompletionPercentage')) {
    function calculateProjectsCompletionPercentage($projects)
    {

        $totalProjects = $projects->count();
        $completedProjects = 0;

        foreach ($projects as $project) {
            // You need to determine a condition that indicates whether the project is completed
            // Let's assume that the 'status' property indicates the project's completion status
            if ($project->status === 'completed') {
                $completedProjects++;
            }
        }

        if ($totalProjects > 0) {
            $completionPercentage = ($completedProjects / $totalProjects) * 100;
        } else {
            $completionPercentage = 0; // To avoid division by zero if there are no projects
        }

        return $completionPercentage;
    }
}

if (!function_exists('imagesInUse')) {
    function imagesInUse()
    {

        // For example, from the projects table
        $projectImages = projects::pluck('project_image')->toArray();
        // From the clients and users tables
        $clientAvatars = clients::pluck('avatar')->toArray();
        $userAvatars = User::pluck('avatar')->toArray();
        $profileImages = profiles::pluck('photo')->toArray();
        $taskImages = tasks::pluck('image')->toArray();

        $allImagePaths = array_merge($projectImages, $clientAvatars, $userAvatars, $profileImages, $taskImages);

        return $allImagePaths;
    }

}

if (!function_exists('project_progress')) {
    function project_progress($project)
    {
        $totalTasks = 0;
        $completedTasks = 0;

        foreach ($project->phases as $phase) {
            foreach ($phase->tasks as $task) {
                $totalTasks++;
                if ($task->status === 'completed') {
                    $completedTasks++;
                }
            }
        }

        if ($totalTasks === 0) {
            return 0; // No tasks, progress is 0%
        }

        // Calculate progress based on status
        $plannedTasks = $totalTasks - $completedTasks; // Tasks that are not "completed"
        $inProgressTasks = $totalTasks - $completedTasks - $plannedTasks; // Tasks that are "in progress"

        // Define weightages for each status
        $weightagePlanned = 10; // Adjust the weightage based on your preference
        $weightageInProgress = 40; // Adjust the weightage based on your preference
        $weightageCompleted = 100; // 100% for completed tasks

        // Calculate progress using weighted average
        $progress = (($completedTasks * $weightageCompleted) + ($inProgressTasks * $weightageInProgress) + ($plannedTasks * $weightagePlanned)) / ($totalTasks * $weightageCompleted);

        return min(100, $progress); // Cap progress at 100%
    }
}

if (!function_exists('getIconClassName')) {
    function getIconClassName($interest)
    {
        $iconClasses = [
            'reading' => 'fas fa-book',
            'music' => 'fas fa-music',
            'movies' => 'fas fa-film',
            'swimming' => 'fas fa-film',
            'driving' => 'fas fa-film',
            'coding' => 'fas fa-film',
            // Add more mappings as needed
        ];

        if (array_key_exists($interest, $iconClasses)) {
            return $iconClasses[$interest];
        } else {
            return 'fas fa-question-circle';
        }
    }
}

// if (!function_exists('project_progress')) {
// function project_progress($project)
// {
//     $totalTasks = 0;
//     $completedTasks = 0;

//     foreach ($project->phases as $phase) {
//         foreach ($phase->tasks as $task) {
//             $totalTasks++;
//             if ($task->status === 'completed') {
//                 $completedTasks++;
//             }
//         }
//     }

//     return ($totalTasks > 0) ? ($completedTasks / $totalTasks) * 100 : 0;
// }
// }


?>