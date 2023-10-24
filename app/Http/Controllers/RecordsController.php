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
    public function transactions()
    {
        $user = Auth::user();

        if (request()->has('account') && request()->has('month') && request()->input('month') > 0) {
            $account_id = request()->input('account');
            $month_id = request()->input('month');

            $account = accounts::with([
                'transactions' => function ($query) use ($month_id) {
                    $query->whereMonth('transaction_date', $month_id)
                        ->orderBy('transaction_date', 'asc');
                }
            ])->where('user_id', $user->id)->find($account_id);

        } elseif (request()->has('account') && !request()->has('month')) {
            $account_id = request()->input('account');
            $account = accounts::with([
                'transactions' => function ($query) {
                    $query->orderBy('transaction_date', 'asc');
                }
            ])->where('user_id', $user->id)->find($account_id);
        } elseif (request()->has('month') && !request()->has('account') && request()->input('month') > 0) {
            $month_id = request()->input('month');
            $account = accounts::with([
                'transactions' => function ($query) use ($month_id) {
                    $query->whereMonth('transaction_date', $month_id)
                        ->orderBy('transaction_date', 'asc');
                }
            ])->where('user_id', $user->id)->first();
        } else {
            $account = accounts::with([
                'transactions' => function ($query) {
                    $query->orderBy('transaction_date', 'asc');
                }
            ])->where('user_id', $user->id)->first();
        }

        $data = [];

        $transactions = $account->transactions; // This assumes you have defined a 'transactions' relationship in your Account model

        $data[$account->account_name] = $transactions->map(function ($transaction) {
            return [
                'date' => $transaction->transaction_date,
                'amount' => $transaction->amount,
                'type' => $transaction->transaction_type,
                'method' => $transaction->payment_method,
            ];
        });
        return response()->json($data);
    }
    public function projects()
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
                            'date' => $task->deadline,
                            //Change back to created_at
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