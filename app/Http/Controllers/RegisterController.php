<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
            'address' => 'required|string'
        ]);

        
        $user = User::where('email',$request->email)->first();

        if(!$user) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            return redirect()->route('login')->with('success','Registration Successfully');
        }else{
            return redirect()->back()->with('error','Existing this email,Try Again!');
        }
    }
}
