<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $blog->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->back();
    }
}
