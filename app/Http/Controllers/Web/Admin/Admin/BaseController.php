<?php

namespace App\Http\Controllers\Web\Admin\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class BaseController extends Controller
{
    public function __construct()
    {
        // dd(Auth::user()->user_type_id == 2 );
        // if(Auth::user()->user_type_id){
        //     return redirect()->back();
        // }
        
    }
    public function index()
    {
        return view('pages.admin.admin.admin_account');
    }

    public function update(Request $request)
    {
        if($request->password == null){
            $data = Users::findOrFail($request->id);
            $data->name=$request->name;
            $data->save();
        }

        else
        {
            $data = Users::findOrFail($request->id);

            $validator = Validator::make($request->all(), 
            [
                'fullname' => 'required|string|max:255',
                'password' => 'required|string|min:5|confirmed'
            ]);

            if ($validator->fails()) {
                return redirect()->route('admin.account')->with('error','Please Check Your Input Again')
                            // ->withErrors($validator)
                            ->withInput();
            }

            $data->full_name=$request->fullname;
            $data->password=Hash::make($request->password);
            $data->save();
        }
        return redirect()->route('admin.account')->with('success','Data Updated');
    }
    
}
