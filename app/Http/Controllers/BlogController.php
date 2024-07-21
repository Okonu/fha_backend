<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $popularPosts = Post::latest()->take(2)->get();
        $recentPosts = Post::latest()->take(5)->get();
        $authorName = $recentPosts->first()->author->name ?? 'Unknown Author';
        $tags = Post::pluck('slug')->unique()->toArray();

        return view('blog.index', compact('popularPosts', 'recentPosts', 'authorName', 'tags'));
    }
}
