<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function addComment(Request $request)
    {
        $input = $request->all();
        $data = new Comment();
        $data->content = $input['content'];
        $data->user_id = auth::id();
        $data->post_id = $input['post_id'];
        $data->save ();
        $data->time = $data->created_at->diffForHumans();
        $data->username = $data->user->firstname.' '. $data->user->lastname;
        if($data->user->photo_id)
            $data->image = $data->user->photo->file;
        else
            $data->image = '\images\profile.jpg';
        $data->commentId = $data->id;
        return response ()->json ( $data );

    }

    public function deleteComment(Request $request) {

        $input = $request->all();
        Comment::find ($input['id'])->delete ();
        return response ()->json ();
    }
}
