<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;
use App\Models\inbox;

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
    public function messages()
    {
        $messages = [];

        if (request()->has('data') && request()->input('data') != null) {
            $messages = DB::connection('portfolio_db')
                ->table('messages')
                ->where(request()->input('data'), true)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $messages = DB::connection('portfolio_db')
                ->table('messages')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $htmlContent = View::make('partials.mail', ['messages' => $messages])->render();

        $data = ['messages' => $messages, 'htmlContent' => $htmlContent];

        return response()->json($data);
    }
    public function gallery()
    {
        $imageUrls = [];

        if (request()->has('images') && request()->input('images') == 'avatars') {
            $images = Storage::files('public/avatars');
        } elseif (request()->has('images') && request()->input('images') == 'projects') {
            $images = Storage::files('public/projects');
        } elseif (request()->has('images') && request()->input('images') == 'defaults') {
            $images = Storage::files('public/images');
        } elseif (request()->has('images') && request()->input('images') == 'unused') {
            // Get images in use
            $usedImages = imagesInUse();

            // Fetch images from three folders and remove 'public/' from each path
            $allImages = array_merge(
                array_map(function ($image) {
                    return Str::replaceFirst('public/', '', $image);
                }, Storage::files('public/avatars')),
                array_map(function ($image) {
                    return Str::replaceFirst('public/', '', $image);
                }, Storage::files('public/projects')),
                array_map(function ($image) {
                    return Str::replaceFirst('public/', '', $image);
                }, Storage::files('public/images'))
            );

            // Filter out used images
            $images = array_diff($allImages, $usedImages);
        } else {
            // Fetch images from three folders
            $avatars = Storage::files('public/avatars');
            $projects = Storage::files('public/projects');
            $defaults = Storage::files('public/images');

            // Combine images from all three folders
            $images = array_merge($avatars, $projects, $defaults);
        }

        // Remove 'public/' from the URL using the asset function
        $imageUrls = array_map(function ($image) {
            return asset('storage/' . Str::replaceFirst('public/', '', $image));
        }, $images);

        $cards = View::make('partials.gallery', ['imageUrls' => $imageUrls])->render();

        $data = ['imageUrls' => $imageUrls, 'cards' => $cards];

        return response()->json($data);
    }
}