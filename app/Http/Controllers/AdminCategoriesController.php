<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->sortBy('name');

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Category::create($request->all())){
            return redirect('admin/category');
        }
        else{
            return $request->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->sortBy('name');
        $category = Category::find($id);

        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $category = Category::find($id);

        if($category->update($request->all())){
            return redirect('admin/category');
        }
        else{
            return $request->all();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete())
            return redirect('admin/category');
        else
            return "Deleted failed!";
    }

    public function delete($id)
    {
        $categories = Category::all()->sortBy('name');
        $category = Category::find($id);

        return view('admin.category.delete', compact('category', 'categories'));
    }

    public function addItem(Request $request)
    {
        $rules = array(
            'name' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Data();
            $data->name = $request->name;
            $data->save();
            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = Data::all();
        return view('welcome')->withData($data);
    }
    public function editItem(Request $req)
    {
        $data = Data::find($req->id);
        $data->name = $req->name;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem(Request $req)
    {
        Data::find($req->id)->delete();
        return response()->json();
    }
}
