<?php

namespace App\Http\Controllers\Web\Admin\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ServerList;
use Validator;
use DataTables;

class ServerController extends Controller
{
    public function Index()
    {
        $data= ServerList::all();
        return view ('pages.admin.superadmin.super_admin_manage_server',compact('data'));
    }

    public function json()
    {
        return Datatables::of(ServerList::all())->make(true);
    }

    public function datatableServer()
    {
        return view('pages.admin.superadmin.super_admin_dt_manage_server');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|string|max:255|',
            'ip' => 'required|string|max:255|unique:server_list,ip',
            'username' => 'required|string|max:255|',
            'password' => 'required|string|max:255|',
            'port' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return redirect()->route('super.server.list')->with('error','Please Check Your Data!')
                        // ->withErrors($validator)
                        ->withInput();
        }
        
        $data= new ServerList;
        $data->name=$request->name;
        $data->ip=$request->ip;
        $data->username=$request->username;
        $data->password=$request->password;
        $data->port=$request->port;
        $data->save();

        return $data ? redirect()->route('super.server.list')->with('success','Data Insert To Database Success')
                     : route('super.server.list')->with('danger','Invalid Action');
        
    }

    public function edit($id)
    {
        $id=ServerList::findOrFail($id);
        return view('pages.admin.superadmin.super_admin_edit_server', compact('id'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data= ServerList::findOrFail($request->id);
        $data->name=$request->name;
        $data->ip=$request->ip;
        $data->username=$request->username;
        $data->password=$request->password;
        $data->port=$request->port;
        $data->save();

        return $data ? redirect()->route('super.server.list')->with('success','Update Database Success')
                     : route('super.server.list')->with('danger','Invalid Action');
    }

    public function delete(Request $request)
    {
        $data= ServerList::findOrFail($request->id);
        $data->delete();

        return $data ? redirect()->route('super.server.list')->with('success','Data Removed From Database')
                     : route('super.server.list')->with('danger','Invalid Action');;
    }

    public function getOne(Request $request){
        $data=ServerList::findOrFail($request->id);
        return response()->json([
           'data' => $data
        ]);
    }

    public function serverGit($id)
    {
        $data= ServerList::findOrFail($id);
        $git = $data->gitProject()->get();

        return view('pages.admin.superadmin.super_admin_server_view')->with(['data'=>$data, 'git'=>$git]);
    }
}
