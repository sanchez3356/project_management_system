<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;

class RecordsController extends Controller
{
    public function getTransactionData()
    {
        $user = Auth::user();
        $accounts = accounts::with('transactions')->where('user_id', $user->id)->get(); // Use 'get' to retrieve the results as a collection
        $data = [];

        foreach ($accounts as $account) {
            // Use the 'transactions' relationship to fetch transactions for the account
            $transactions = $account->transactions; // This assumes you have defined a 'transactions' relationship in your Account model
            $data[$account->account_name] = $transactions->map(function ($transaction) {
                return [
                    'date' => $transaction->transaction_date,
                    'amount' => $transaction->amount,
                    'type' => $transaction->transaction_type,
                    'method' => $transaction->payment_method,
                ];
            });
        }
        return response()->json($data);
    }
    public function getProjectsData()
    {
        $user = Auth::user();

        // Use Eager Loading to load projects, their phases, and tasks
        $projects = projects::with('phases.tasks')->where('created_by', $user->id)->get();

        $data = [];

        foreach ($projects as $project) {
            // Access related data using the eager-loaded relationships
            $phases = $project->phases;
            $projectData = [
                'project_name' => $project->project_title,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date,
                'priority' => $project->priority,
                'rate' => $project->rate,
                'phases' => [],
            ];

            foreach ($phases as $phase) {
                $tasks = $phase->tasks;
                $phaseData = [
                    'phase_name' => $phase->phase,
                    'start_date' => $phase->start_date,
                    'end_date' => $phase->end_date,
                    'status' => $phase->status,
                    'tasks' => $tasks->map(function ($task) {
                        return [
                            'task' => $task->task,
                            'date' => $task->deadline,//Change back to created_at
                            'order' => $task->order,
                            'deadline' => $task->deadline,
                            'status' => $task->status,
                            // Include other task columns as needed
                        ];
                    }),
                ];

                $projectData['phases'][] = $phaseData;
            }

            $data[] = $projectData;
        }

        return response()->json($data);
    }
}