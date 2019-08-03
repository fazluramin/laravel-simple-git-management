<?php

namespace App\Http\Controllers\Web\App\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.app.auth.login');
    }

    public function detect(Request $request){

        // $request->flash(); //Save Old Input Value
        
            if (Auth::attempt($request->only('email', 'password'))) // Check if Authentication data exists
            {
                if(Auth::user()->is_active == 1) //Check if User is Active
                {
                    if(Auth::user()->user_type_id == 1)
                    {
                        return redirect()->route('super.index');
                    }
                    elseif(Auth::user()->user_type_id == 2)
                    {
                        return redirect()->route('admin.index');
                    }
                    else
                    {
                        return redirect()->route('user.index');
                    }
                }
                else
                {
                    return redirect()->route('login')->with('error','Your Account Disabled Or Not Activated yet');
                }
            }
            else
            {
                return redirect()->back()->with('warning','Email And Password Did not Match')->withInput();
            }
    }
    
    public function logout(){
        
        Auth::logout();

        return redirect()->route('login');
    }
}
