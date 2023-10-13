<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //fucntion for login by authentication
    public function login(Request $request){
        try{
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
    
                return response()->json([
                
                  'success' => true,
                    'user' => auth()->user(),
                ]);
                
            }
        }catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
       

     
        
    }
    //function for sign up by authentication
    public function register(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
    
            auth()->login($user);
    
            return response()->json([
                'user' => $user,
                'message' => 'Successfully registered'
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    
    //function for logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //function for send link for reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' =>'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
          ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    
}
