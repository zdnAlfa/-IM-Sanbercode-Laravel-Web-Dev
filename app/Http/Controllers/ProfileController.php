<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Auth::user()->profile;
        return view('profile.show', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'nullable|numeric',
            'bio' => 'nullable|string',
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'age' => $request->age,
            'bio' => $request->bio,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profile berhasil dibuat!');
    }

    public function edit()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'age' => 'nullable|numeric',
            'bio' => 'nullable|string',
        ]);

        $profile = Profile::where('user_id', Auth::id())->first();
        
        if ($profile) {
            $profile->update([
                'age' => $request->age,
                'bio' => $request->bio,
            ]);
        } else {
            Profile::create([
                'user_id' => Auth::id(),
                'age' => $request->age,
                'bio' => $request->bio,
            ]);
        }

        return redirect()->route('profile.show')->with('success', 'Profile berhasil diperbarui!');
    }
}