<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'email' => 'required|min:3|max:50|email:dns',
            'name' => 'required|min:2|max:50',
            'password' => 'required|min:8|max:50'
        ]);
        $validateData['password'] = Hash::make($validateData['password']); // untuk mengenkripsi password pada databasenya
        User::create($validateData);
        return redirect('/login');
    }
}
