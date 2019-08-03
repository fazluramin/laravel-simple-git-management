<?php

namespace App\Http\Controllers\Web\Admin\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Validator;
use Hash;
use Mail;
use App\Mail\AdminInvitation;
use App\Mail\AdminResetPassword;

class AdminAccountController extends Controller
{
    public function index(){
        $data = Users::where('user_type_id', 2)->get();
        return view ('pages.admin.superadmin.super_admin_manage_admin',compact('data'));
    }
    
    public function add(Request $request)
    {
        if(Users::where(['email'=>$request->email])->get()->count() >= 1)
        {
            $notif= array(
                'message' => 'Error! Email has been Registered',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notif);
        }
        $validator = Validator::make($request->all(), 
        [
            'email' => 'required|string|email|max:255|unique:users,email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('super.add.admin')->with('error','Email Has been registered')
                        ->withErrors($validator);
                        // ->withInput();
        }
        $data = new Users;
        $data->name = 'admin'.str_random(4);
        $data->email = $request->email;
        $data->password = Hash::make(str_random(8));
        $data->is_active = 0 ; 
        $data->user_invited_token = str_random(60);
        $data->user_type_id = 2;   
        $data->save(); 

        $mail = Mail::to($request->email)->send(new AdminInvitation($data));
        
        return redirect()->route('super.admin.account')->with('success','Admin Invitation Sent');

    }

    public function reset($id)
    {
        $data = Users::findOrFail($id);
        $credentials=strtolower(str_random(6));
        $data->password=Hash::make($credentials);
        $data->user_invited_token=str_random(60);
        $data->update(); 
        
        $mail = Mail::to($data->email)->send(new AdminResetPassword($credentials));

        return redirect()->route('super.admin.account')->with('success','Reset Pasword Account Has been sent to '.$data->email.'');
    }

    public function update(Request $request)
    {
        $data= Users::findOrFail($request->id);
        $data->name = $request->name;
        $data->save();

        return $data ? redirect()->route('super.admin.account')->with('success','Data Updated To Database')
                     : route('super.admin.account')->with('danger','Invalid Action');;
    }

    public function delete(Request $request)
    {
        $data= Users::findOrFail($request->id);
        $data->delete();

        return $data ? redirect()->route('super.admin.account')->with('success','Data Removed From Database')
                     : route('super.admin.account')->with('danger','Invalid Action');
    }

    public function activate($id)
    {
        $data = Users::findOrFail($id);
        //Comparing the data fetched from DB and compare to 1 as active | or 0 as inactive 
        if($data->is_active == 1) 
        {
            $data->is_active = 0;
            $data->update();
            return redirect()->route('super.admin.account');
        }
        else
        {
            $data-> is_active = 1;
            $data->update();
            return redirect()->route('super.admin.account');
        }
    }

    public function getOne(Request $request)
    {
        $data=Users::findOrFail($request->id);
        return response()->json([
           'data' => $data
        ]);
    }
}
