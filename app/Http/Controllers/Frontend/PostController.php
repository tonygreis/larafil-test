<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'topics'])->orderBy('updated_at', 'DESC')->paginate(12);

        return view('frontend.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.posts.show', compact('post'));
    }
}
