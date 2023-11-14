<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $careers = DB::connection('portfolio_db')->table('careers')->where('careers.profile_id', '=', $profile->id)->join('roles', 'careers.id', '=', 'roles.career_id')->get();
        $references = DB::connection('portfolio_db')->table('references')->where('references.profile_id', '=', $profile->id)->get();
        $languages = DB::connection('portfolio_db')->table('languages')->where('languages.profile_id', '=', $profile->id)->get();

        return view('portfolio.resume', compact('profile', 'pageTitle', 'contacts', 'education', 'careers', 'references', 'languages'));
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