<?php

namespace App\Http\Controllers\Web\Admin\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ServerList;
use App\Models\GitProjectHasUsers;
use App\Models\Users;
use App\Models\GitProject;
use Validator;

class GitController extends Controller
{
    public function index(){
        $select= ServerList::all();
        $data = GitProject::with(array('serverList'=>function($query){
                            $query->select('id','name','ip');                
                            }))->get();
        $user = Users::where('user_type_id', 3 )->get();
        return view('pages.admin.admin.admin_manage_git', compact('select','data','user'));
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|string|max:255|',
            'url'=> 'required|string|max:255|unique:git_project,url',
            'branch' => 'required|string|max:255|',
            'server_id' => 'required|string|max:255|',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('.git.project')->with('error','Please Check Your Data!')
                        // ->withErrors($validator)
                        ->withInput();
        }
        $data = new GitProject;
        $data->name = $request->name;
        $data->url = $request->url;
        $data->branch=$request->branch;
        $data->server_list_id=$request->server_id;
        $data->save();

        return $data ? redirect()->route('admin.git.project')->with('success','Data Insert To Database Success')
                     : route('admin.git.project')->with('danger','Invalid Action');
    }

    public function edit($id)
    {
        // $select= ServerList::pluck('name','id');
        // $data = GitProject::findOrFail($id);
        // return view('pages.admin.adminadmin.admin_admin_edit_git')->with(['select'=>$select, 'data'=>$data]);
        $select= ServerList::all();
        $data = GitProject::findOrFail($id);
        return view('pages.admin.admin.admin_admin_edit_git',compact('select','data'));

    }

    public function update(Request $request)
    {
        $data= GitProject::findOrFail($request->id);
        $data->name = $request->name;
        $data->url = $request->url;
        $data->branch=$request->branch;
        $data->server_list_id=$request->server_id;
        $data->save();

        return $data ? redirect()->route('admin.git.project')->with('success','Update Database Success')
                     : route('admin.git.project')->with('danger','Invalid Action');
    }

    public function delete(Request $request)
    {
        $data= GitProject::findOrFail($request->id);
        $data->delete();

        return $data ? redirect()->route('admin.git.project')->with('success','Data Removed From Database')
                     : route('admin.git.project')->with('danger','Invalid Action');;
    }

    public function getOne(Request $request){
        $data=GitProject::findOrFail($request->id);
        return response()->json([
           'data' => $data
        ]);
    }

    public function addUser(Request $request)
    {
        if(GitProjectHasUsers::where(['user_id'=>$request->user_id, 'git_project_id'=>$request->git_id])->get()->count() >= 1)
        {
            return redirect()->back()->with('User already Exists on that Git Project');
        }

        $data = new GitProjectHasUsers;
        $data->git_project_id = $request->git_id ;
        $data->user_id = $request->user_id;
        $data->save();

        return redirect()->back()->with('success', 'User successfully Added');
    }

    public function userGit($id)
    {
        $data= GitProject::findOrFail($id);
        $user = GitProjectHasUsers::where('git_project_id', $id)->get();
        $userArr = [];
        foreach($user as $item)
        {
            $takeUser = Users::where('id', $item->user_id)->first();
            array_push($userArr, $takeUser);
        }
        return view('pages.admin.admin.admin_git_view')->with(['user'=>$userArr]);

    }
}
