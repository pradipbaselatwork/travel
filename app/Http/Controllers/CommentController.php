<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;



class CommentController extends Controller
{
    // public function detail($id)
    // {  
    //       $comments = Comment::get();
    //      return view('front.detail',compact('comments'));    
    // }

    public function addComment(Request $request)
    {
      
            $data = $request->all();
            $comment = new Comment;
            $comment->user_id = 2;
            // $comment->gift_id = $data['gift_id'];
            $comment->rating = 3;
            $comment->message = $data['message'];
            $comment->save();
            return redirect()->back();
    }

    public function commentReview()
    {
        $comments = Comment::get();
        return view('front.blog',compact('comments'));
    }
}
