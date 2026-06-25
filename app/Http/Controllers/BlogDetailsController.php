<?php

namespace App\Http\Controllers;

use App\Models\TblBlog;
use App\Models\TblCommentModel;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function blogDetails(Request $request, $blog_url)
    {
        $blog_details = TblBlog::where('blog_url', $blog_url)
            ->where('status', 1)
            ->get();

        $recent_blogs = TblBlog::where('status', 1)
            ->where('blog_url', '!=', $blog_url)
            ->orderBy('created_date', 'desc')
            ->limit(5)
            ->get();

        return view('blog_details', compact('blog_details', 'recent_blogs'));
    }


    public function storeComment(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'comment' => 'required|string|max:500',
            'blog_id' => 'required|string|max:200'
        ]);

        $comment = TblCommentModel::create([
            'commentor' => $request->input('Name'),
            'comment' => $request->input('comment'),
            'blog_id' => $request->input('blog_id'),
            'status' => 1,
            'comment_time' => now()
        ]);

        if ($comment) {
            return response()->json(['status' => 'success', 'message' => 'Comment added successfully!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to add comment. Please try again.']);
        }
    }
}
