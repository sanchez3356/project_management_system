<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use App\Models\budgets;
use App\Models\transactions;
use App\Models\profiles;
use App\Models\inbox;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // $users = User::get();
        $users = User::with('profile')->get();
        $profiles = profiles::get();

        // Retrieve the inbox from the database
        $inbox = inbox::get(); // Assuming "inbox" is your Eloquent model
        $pageTitle = 'Users';

        // You can pass both the project types and project count to the view
        return view('pages.users', compact('profiles','users','inbox', 'pageTitle'));
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
        if ($user !== null) {
            if (request()->has('username')) {
                // Process account details update
                $validator = Validator::make($request->all(), [
                    'username' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'current' => ['required', 'string'],
                    'phone' => ['required', 'numeric', 'digits:10', 'unique:profiles'],
                    'new' => ['nullable', 'string', 'min:8', 'confirmed'],
                ]);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()]);
                }

                // Get the authenticated user
                $me = Auth::user();

                // Check if the current password is correct
                if (!Hash::check($request->input('current'), $me->password)) {
                    return response()->json(['errors' => ['current' => 'Current password is incorrect']]);
                }

                // Update email and name in the 'users' table
                $user->username = $request->input('username');
                $user->email = $request->input('email');
                $user->save();

                // Update email and phone in the 'profiles' table
                $profile = profiles::where('email', $user->email)->first();

                if ($profile) {
                    $profile->email = $request->input('email');
                    $profile->phone = $request->input('phone');
                    $profile->address = $request->input('address');
                    $profile->save();
                }

                // Update the password if 'new' input has a value
                if ($request->has('new') && !empty($request->input('new'))) {
                    $user->password = Hash::make($request->input('new'));
                    $user->save();
                }
                return response()->json(['success' => true, 'message' => 'User account updated succesfully ']);

            } elseif (request()->has('firstName')) {

                // // Process personal details update
                $rules = [
                    'firstName' => 'required|string|max:100',
                    'lastName' => 'required|string|max:100',
                    'jobTitle' => 'required|string|max:100',
                    'gender' => 'required|string|max:10',
                    'birthdate' => 'required|date',
                    'website' => 'required|url',
                    'address1' => 'string|max:200',
                    'address2' => 'string|max:200',
                    'city' => 'required|string|max:100',
                    'county' => 'string|max:100',
                    'country' => 'required|string|max:100',
                ];

                // Create a validator instance with your data and rules
                $validator = Validator::make($request->all(), $rules);

                // Check if the validation fails
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()]);
                }

                $photo = null;
                $profile = profiles::where('email', $user->email)->first();


                if ($profile) {
                    $profile->first_name = $request->input('firstName');
                    $profile->last_name = $request->input('lastName');
                    $profile->job_title = $request->input('jobTitle');
                    $profile->photo = $photo;
                    $profile->bio = $request->input('jobTitle');
                    $profile->gender = $request->input('gender');
                    $profile->birthdate = $request->input('birthdate');
                    $profile->website = $request->input('website');
                    $profile->address_line1 = $request->input('address1');
                    $profile->address_line2 = $request->input('address2');
                    $profile->city = $request->input('city');
                    $profile->county = $request->input('county');
                    $profile->country = $request->input('country');
                    $profile->save();
                }

                return response()->json(['success' => true, 'message' => 'User profile updated succesfully'], 200);

            } elseif (request()->has('userAvatar')) {

                // Validate the request
                $request->validate([
                    'userAvatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    // Adjust the validation rules as needed
                ]);

                // Check if a file was uploaded
                if ($request->hasFile('userAvatar')) {
                    $imagePath = $request->file('userAvatar')->store('public/avatars');
                    $imagePath = str_replace('public/', '', $imagePath);
        
                    // Update the user's avatar URL in the database
                    $user->avatar = $imagePath;
                    $user->save();

                    return response()->json(['success' => true, 'message' => 'User avatar updated successfully'], 200);
                }

                return response()->json(['error' => true, 'message' => 'No file uploaded'], 400);

            } else {

                return response()->json(['success' => false, 'message' => 'Incorrect form subitted']);
            }

        } else {

            return response()->json(['error' => true, 'message' => 'User account not found ' . $id . '--' . $user . '']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}