<?php

namespace App\Http\Controllers\Web\App\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Mail;
use App\Mail\RecoverPassword;

class ForgotPassController extends Controller
{
    public function index()
    {
        return view('pages.app.auth.forgot');
    }

    public function forgotPassword(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email'=> 'required|string|email|max:255|exists:users',
        ]);
        
        if ($validator->fails()) 
        {
            return redirect()->back()->with('error', 'Your Email Does not Exist')->withInput();
        }
        
        $data = Users::where('email', $request->email)->first();
        if ($data->user_type_id == 1)
        {
            return redirect()->back()->with('error', 'Invalid Action')->withInput();
        }

        $mail = Mail::to($request->email)->send(new RecoverPassword($data));

        return redirect()->route('login')->with('success', 'Your Password Recovery Has been sent to Mail')
                                         ->withInput($request->input());
    }

    public function redirectToNewPassword($token)
    {
        $data = Users::where('user_invited_token', $token)->firstOrFail();
        return view('pages.admin.new_password')->with('token', $token);
    }

    public function newPassword(Request $request)
    {
        // dd($request->all());
        $data = Users::where('user_invited_token',$request->token)->first();

        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('login')->with('success', 'Your Password Updated, Please Login With New Password:');
    }

    public function register($token)
    {
        $data = Users::where('user_invited_token', $token)->firstOrFail();
        return view ('pages.admin.new_admin_invite', compact('token'));
    }

    public function postRegister(Request $request)
    {
        $data= Users::where('user_invited_token',$request->code)->first();
        $data->name = $request->name;
        $data->password = Hash::make($request->password);
        $data->is_active = 1;
        $data->save();

        return redirect()->route('login')->with('success','account created, please login');
    }

}
