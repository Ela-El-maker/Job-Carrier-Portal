<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'body' => 'required|min:3|max:1000',
            'parent_id' => [
                'nullable',
                'exists:comments,id',
                function ($attribute, $value, $fail) use ($blog) {
                    if ($value && !Comment::where('id', $value)->where('blog_id', $blog->id)->exists()) {
                        $fail('The parent comment does not belong to this blog.');
                    }
                }
            ]
        ]);

        $comment = new Comment([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id
        ]);

        $blog->comments()->save($comment);

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
