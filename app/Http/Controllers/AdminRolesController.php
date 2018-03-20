<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    public function addRole(Request $request)
    {

        $data = new Role();
        $data->name = $request->name;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);

    }

    public function readRoles(Request $req)
    {
        $data = Role::all();
        return view('admin.role.index')->withData($data);
    }

    public function editRole(Request $request)
    {
        $data = Role::find($request->id);
        $data->name = $request->name;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);
    }

    public function deleteRole(Request $request)
    {
        Role::find($request->id)->delete();
        return response()->json();
    }
}
