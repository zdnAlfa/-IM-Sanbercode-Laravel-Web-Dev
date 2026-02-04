<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function submitRegister(Request $request)
    {
        // Validasi sesuai form yang ada di contoh
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string',
            'language_spoken' => 'array',
            'bio' => 'nullable|string',
        ]);
        
        // Simpan data ke session
        session(['user_data' => $validated]);
        
        return redirect()->route('welcome');
    }
    
    public function welcome()
    {
        $userData = session('user_data');
        
        if (!$userData) {
            return redirect()->route('register');
        }
        
        return view('welcome', ['userData' => $userData]);
    }
}