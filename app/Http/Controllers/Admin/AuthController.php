<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('name' , $request->name)->first();
        if($user){
            $isCorrect = Hash::check($request->password, $user->password);
            if($isCorrect){
                $credentials = $request->only('name', 'password');    
                if(Auth::attempt($credentials)){
                    return redirect('/admin')->with(['status' => 'Login Successfully']);
                }
            }else{
                return back()->with(['error' => 'Password is incorrect']);
            }
        }else{
            return back()->with(['error' => 'User not found']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
