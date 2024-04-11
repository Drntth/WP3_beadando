<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'recipe_id' => 'required|exists:recipes,id',
            'message' => 'required|string',
        ]);

        Comment::create([
            'user_id' => $validatedData['user_id'],
            'recipe_id' => $validatedData['recipe_id'],
            'message' => $validatedData['message'],
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
        ]);

        $comment->update([
            'message' => $validatedData['message'],
        ]);

        return redirect()->route('comments.show', $comment)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
