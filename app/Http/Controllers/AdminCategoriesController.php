<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function addCategory(Request $request)
    {

        $data = new Category();
        $data->name = $request->name;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);

    }

    public function readCategories(Request $req)
    {
        $data = Category::all();
        return view('admin.category.index')->withData($data);
    }

    public function editCategory(Request $request)
    {
        $data = Category::find($request->id);
        $data->name = $request->name;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);
    }

    public function deleteCategory(Request $request)
    {
        Category::find($request->id)->delete();
        return response()->json();
    }

}
