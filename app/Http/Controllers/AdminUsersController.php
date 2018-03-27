<?php

namespace App\Http\Controllers;

use App\Month;
use App\Photo;
use App\Post;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.manage', compact('users', $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months = Month::all();

        return view('admin.user.create', compact('months', $months));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$this->validator($request->all())->validate();

        $input = $request->all();
        $birthdate = $input['birth_day'].'-'.$input['birth_month'].'-'.$input['birth_year'];
        $request->merge(['birthdate'=>$birthdate]);

        $data = $request->all();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;
        }

        $data['password'] = bcrypt($input['password']);

        User::create($data);
        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->orderBy('created_at','DESC')->limit(8)->get();
        return view('admin.user.profile', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $months = Month::all();
        $birthdate = explode("-",$user->birthdate);
        return view('admin.user.edit', compact('user', 'birthdate', 'months'));
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
        $input = $request->all();
        $user = User::findOrFail($id);

        $birthdate = $input['birth_day'].'-'.$input['birth_month'].'-'.$input['birth_year'];
        $request->merge(['birthdate'=>$birthdate]);

        $data = $request->all();
        if($file = $request->file('photo_id')){
            //delete old file
            if($user->photo_id != 0){
                unlink(public_path(). $user->photo->file);
                Photo::findOrFail($user->photo_id)->delete();
            }

            //Create new file
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;

            //Update Session
            if(Auth::user()->id == $id){
                $username = $user->firstname. ' '. $user->lastname;
                $image = $photo->file;
                $request->session()->put(['username'=>$username, 'image'=>$image]);
            }
        }
        $user->update($data);

        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();
        return redirect('admin/user');
    }

    public function delete($id){

        $user = User::findOrFail($id);
        $months = Month::all();
        $birthdate = explode("-",$user->birthdate);
        return view('admin.user.delete', compact('user', 'months', 'birthdate'));
    }

    public function dashboard(){

        $users = User::count();
        $posts = Post::count();
        $shops = Shop::count();

        return view('admin.dashboard', compact('users', 'posts', 'shops'));

    }

    public function trash(){
        $users = User::onlyTrashed()->get();

        return view('admin.user.trash', compact('users', $users));

    }

    public function restore($id){

        User::onlyTrashed()->whereId($id)->restore();
        return redirect('admin/user');
    }

    public function deleteTrashed($id){

        $user = User::onlyTrashed()->whereId($id)->get();

        if($user[0]->photo_id != null){
            unlink(public_path(). $user[0]->photo->file);
            Photo::findOrFail($user[0]->photo_id)->delete();
        }
        $user[0]->forceDelete();
        return $this->trash();
    }
}
