<?php

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
    function profile_progress($user, $profile)
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
        $profileAttributes = $profile->getAttributes(); // Get all profile attributes

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