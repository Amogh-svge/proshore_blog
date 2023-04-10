<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'comments' => 'required|min:2',
        ]);

        $comment = [
            'author_id' => User::all()->random()->id,
            'blog_id' => $request->blog_id,
            'comments' => $request->comments,
            'published_date' =>  date('Y-m-d H:i:s')
        ];

        $created = Comment::create($comment);
        return back();
    }
}
