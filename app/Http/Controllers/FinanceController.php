<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;
use App\Models\profiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $profile = profiles::where('email', $user->email)->first();

        // Check if the user has any accounts
        $account = $user->accounts;
        if ($account->isEmpty()) {
            // Redirect to a page or show a message for users with no accounts
            return redirect()->route('home');
        }

        // Check if the user has any budgets
        // $budgets = $user->budgets;
        // if ($budgets->isEmpty()) {
        //     // Redirect to a page or show a message for users with no budgets
        //     return redirect()->route('no-budgets-page');
        // }

        // Check if there are transactions related to the user's accounts
        // $transactions = transactions::whereIn('account_id', $accounts->pluck('id'))->get();

        // Assuming you have a route for showing finances
        $pageTitle = "Finances";

        $accounts = accounts::with('transactions')->where('user_id', $user->id)->get(); // Use 'get' to retrieve the results as a collection
        $data = [];

        foreach ($accounts as $account) {
            // Use the 'transactions' relationship to fetch transactions for the account
            $transactions = $account->transactions; // This assumes you have defined a 'transactions' relationship in your Account model
            $data[$account->account_name] = $transactions->map(function ($transaction) {
                return [
                    'id' => $transaction->id,
                    'date' => $transaction->transaction_date,
                    'amount' => $transaction->amount,
                    'type' => $transaction->transaction_type,
                    'method' => $transaction->payment_method,
                    'description' => $transaction->description,
                ];
            });
        }


        // Pass the filtered data to the view
        return view('pages.finance', compact('user', 'profile', 'pageTitle', 'accounts', 'transactions', 'data'));
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
        $rules = [
            'amount' => 'required|numeric|max:1000000',
            'date' => 'required|date',
            'method' => 'required|string',
            'type' => 'required|string',
            'desc' => 'required|string',
        ];

        // Create a validator instance with your data and rules
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $transaction = new transactions();
        $transaction->account_id = Auth::user()->id;
        $transaction->user_id = Auth::user()->id;
        $transaction->description = $request->input('desc');
        $transaction->transaction_date = $request->input('date');
        $transaction->payment_method = $request->input('method');
        $transaction->transaction_type = $request->input('type');
        $transaction->amount = $request->input('amount');
        // Set other Transaction properties
        $transaction->save();

        return response()->json(['success' => true, 'message' => 'Transaction record added succesfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = transactions::find($id);
        if ($transaction) {
            $rules = [
                'amount' => 'required|numeric|max:1000000',
                'date' => 'required|date',
                'method' => 'required|string',
                'type' => 'required|string',
                'description' => 'required|string',
            ];

            // Create a validator instance with your data and rules
            $validator = Validator::make($request->all(), $rules);

            // Check if the validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            $transaction->update([
                'account_id' => $request['project_title'],
                'user_id' => Auth::user()->id,
                'description' => $request['description'],
                'transaction_date' => $request['date'],
                'payment_method' => $request['method'],
                'transaction_type' => $request['type'],
                'amount' => $request['amount'],
                // Update other attributes as needed
            ]);

            return response()->json(['success' => true, 'message' => 'Transaction record added succesfully']);
        } else {
            // Handle the case where no transaction is found with the given ID
            return  response()->json(['success' => false, 'message' => 'Transaction record not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = transactions::find($id);

        if (!$transaction) {
            // Phase not found
            return response()->json(['message' => 'Transaction record not found'], 404);
        }

        // Attempt to delete the Phase
        try {
            $transaction->delete();
            return response()->json(['message' => 'Transaction record deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any potential errors
            return response()->json(['message' => 'Error deleting the transaction record'], 500);
        }
    }
}