<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __call($method, $parameters)
    {
        return $this->middleware(['auth','verified']);
    }

    public function store(Request $request,Apartment $apartment)
    {
        $comment = new Comment();

        $comment->text = $request->comment;
        $comment->apartment_id = $apartment->id;
        $comment->user_id = auth()->user()->id;

        $comment->save();

        return back()->with('success',__('form.commentposted'));
    }

    public function destroy(Comment $comment)
    {
        if($comment->user->id == auth()->user()->id)
        {
            $comment->delete();
            return back()->with('success',__('guest.commentdeleted'));
        }

        return back();
    }
}
