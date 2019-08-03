<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\GitProject;
use App\Models\GitProjectHasUsers;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function index(){
        return view('pages.app.user_account');
    }

    public function git(){
        $user = Users::find(Auth::user()->id);
        $git = GitProjectHasUsers::where('user_id', Auth::user()->id)->get();
    
        $gitArr = [];
        foreach($git as $item)
        {
            $takeGit = GitProject::where('id', $item->git_project_id)->first();
            array_push($gitArr, $takeGit);
        }

        return view('pages.app.user_git_list')->with(['git'=>$gitArr]);
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
                return redirect()->route('user.account')->with('error','Please Check Your Input Again')
                            // ->withErrors($validator)
                            ->withInput();
            }

            $data->full_name=$request->fullname;
            $data->password=Hash::make($request->password);
            $data->save();
        }

        return redirect()->route('user.account')->with('success','Data Updated');
    }
}
