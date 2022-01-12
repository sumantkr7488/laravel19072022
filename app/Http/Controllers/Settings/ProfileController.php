<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $profileData = $request->validated();
        $profile     = $request->user();

        if ($request->hasFile('profile_picture'))
        {
            $picture = $request->profile_picture;
            $fileName = "profile-picture-{$profile->id}." . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload'), $fileName);
            
            $profileData['profile_picture'] = $fileName;
        }

        $profile->update($profileData);

        return back()->with('message', 'Profile has been updated successfully');
    }
}
