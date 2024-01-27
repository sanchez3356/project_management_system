<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\profiles;
use App\Models\careers;
use App\Models\skills;



class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Assuming you are using Laravel's authentication

        $profile = DB::connection('portfolio_db')
            ->table('users')
            ->where('users.email', '=', $user->email)
            ->where('users.username', '=', $user->username)
            ->join('profiles', 'users.id', '=', 'profiles.profileable_id')
            ->first();

        $pageTitle = 'Resume';
        $contacts = DB::connection('portfolio_db')->table('contacts')->where('contacts.profile_id', '=', $profile->id)->get();
        $education = DB::connection('portfolio_db')->table('education')->where('education.profile_id', '=', $profile->id)->get();
        $references = DB::connection('portfolio_db')->table('references')->where('references.profile_id', '=', $profile->id)->get();
        $languages = DB::connection('portfolio_db')->table('languages')->where('languages.profile_id', '=', $profile->id)->get();
        $interests = DB::connection('portfolio_db')->table('interests')->where('interests.profile_id', '=', $profile->id)->get();
        $skills = skills::where('skills.profile_id', '=', $profile->id)->get();
        // dd($skills);
        $careers = careers::where('careers.profile_id', '=', $profile->id)->with('roles')->get();
        
        return view('portfolio.resume', compact('profile', 'pageTitle', 'contacts', 'education', 'careers', 'references', 'skills', 'languages', 'interests', 'user'));
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
        $user = User::find($id);
        if ($user !== null)  {
            $profile = profiles::where('email', $user->email)->first();
            if ($profile !== null && $profile->visibility !== 'public') {

                $profile->visibility = 'public';
                $profile->save();
                                
                DB::connection('portfolio_db')->table('users')->insert([
                    'username' => $user->username,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'password' => $user->password,
                    'type' => 'admin',
                    // other columns...
                ]);
                

                DB::connection('portfolio_db')->table('profiles')->insert([
                    'first_name' => $profile->first_name,
                    'last_name' => $profile->last_name,
                    'title' => $profile->job_title,
                    'email' => $profile->email,
                    'photo' => $profile->photo,
                    'bio' => $profile->bio,
                    'address' => $profile->address,
                    'phone' => $profile->phone,
                    'birthdate' => $profile->birthdate,
                    'gender' => $profile->gender,
                    'address_line1' => $profile->address_line1,
                    'address_line2' => $profile->address_line2,
                    'city' => $profile->city,
                    'county' => $profile->county,
                    'country' => $profile->country,
                    'website' => $profile->website,
                    'profileable_id' => $profile->profileable_id,
                    'profileable_type' => $profile->profileable_type,
                    // other columns...
                ]);
        
                return response()->json(['success' => true, 'message' => 'Portfolio user profile created successfully']);
        
            }else {
                return response()->json(['success' => false, 'message' => 'User profile not found!']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'User not found!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}