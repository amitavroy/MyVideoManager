<?php

namespace App\Http\Controllers;

use App\Events\Comment\CommentCreated;
use App\User;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'videoId' => 'required',
        ]);

        $comments = Comment::where('video_id', $data['videoId'])
            ->orderBy('id', 'desc')
            ->get();

        return response($comments, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'comment' => 'required|min:3',
            'videoId' => 'required',
        ]);

        $comment = Comment::create([
            'body' => $data['comment'],
            'user_id' => Auth::user()->id,
            'is_published' => 1,
            'video_id' => $data['videoId']
        ]);

        $comment = Comment::find($comment->id);

        event(new CommentCreated($comment));

        return response($comment, 201);
    }
}
