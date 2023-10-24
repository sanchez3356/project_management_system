<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;
use App\Models\profiles;
use App\Models\inbox;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $profile = profiles::where('email', $user->email)->first();

        // Retrieve the inbox from the database
        $inbox = inbox::all(); // Assuming "inbox" is your Eloquent model
        $pageTitle = 'Profile';

        // You can pass both the project types and project count to the view
        return view('pages.profile', compact('inbox', 'profile', 'pageTitle'));
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
        //
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
        $user = User::find($id);
        if ($user) {

            if (request()->has('account-details')) {
                // Process account details update
                // Validate the form data
                $validator = Validator::make($request->all(), [
                    'username' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'current' => ['required', 'string'],
                    'phone' => ['required', 'numeric', 'digits:10'],
                    'new' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()]);
                }

                // Get the authenticated user
                // $user = Auth::user();

                // Check if the current password is correct
                if (!Hash::check($request->input('current'), $user->password)) {
                    return response()->json(['errors' => ['current' => 'Current password is incorrect']]);
                }

                // Update email and name in the 'users' table
                $user->username = $request->input('username');
                $user->email = $request->input('email');
                $user->save();

                // Update email and phone in the 'profiles' table
                $profile = profiles::where('email', $user->email)->first();

                if ($profile) {
                    $profile->username = $request->input('username');
                    $profile->email = $request->input('email');
                    $profile->phone = $request->input('phone');
                    $profile->address = $request->input('address');
                    $profile->save();
                }

                // Update the password
                $user->password = Hash::make($request->input('new'));
                $user->save();

                return response()->json(['success' => true, 'message' => 'User account updated succesfully']);

            }

            if (request()->has('personal-details')) {
                // // Process personal details update
                // $validator = Validator::make($request->all(), [
                //     'firstName' => ['required', 'string', 'max:100'],
                //     'lastName' => ['required', 'string', 'max:100'],
                //     'jobTitle' => ['required', 'string', 'max:100'],
                //     'gender' => ['required', 'string', 'max:10'],
                //     'birthdate' => ['required', 'date'],
                //     'website' => ['required', 'url'],
                //     'address1' => ['string', 'max:200'],
                //     'address2' => ['string', 'max:200'],
                //     'city' => ['required', 'string', 'max:100'],
                //     'county' => ['string', 'max:100'],
                //     'country' => ['required', 'string', 'max:100'],
                // ]);
                $request->validate([
                    'firstName'      => 'required|string|max:100',
                    'lastName'      => 'required|string|max:100',
                    'jobTitle'      => 'required|string|max:100',
                    'gender'      => 'required|string|max:10',
                    'birthdate'      => 'required|date',
                    'website'      => 'required|url',
                    'address1'      => 'string|max:200',
                    'address2'      => 'string|max:200',
                    'city'      => 'required|string|max:100',
                    'county'      => 'string|max:100',
                    'country'      => 'required|string|max:100',
                ]);

                // Check if the validation fails
                if ($request->fails()) {
                    return response()->json(['errors' => $request->errors()]);
                }
                $photo = null;
                $profile = profiles::where('email', $user->email)->first();
                $profile->update([
                    'first_name' => $request->input('firstName'),
                    'last_name' => $request->input('lastName'),
                    'job_title' => $request->input('jobTitle'),
                    'photo' => $photo,
                    'bio' => $request->input('bio'),
                    'gender' => $request->input('gender'),
                    'birthdate' => $request->input('birthdate'),
                    'website' => $request->input('website'),
                    'address1' => $request->input('address1'),
                    'address2' => $request->input('address2'),
                    'city' => $request->input('city'),
                    'county' => $request->input('county'),
                    'country' => $request->input('country'),
                ]);

                return response()->json(['success' => true, 'message' => 'User profile updated succesfully']);

            }

        }
        return response()->json(['success' => false, 'message' => 'User profile not found']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}