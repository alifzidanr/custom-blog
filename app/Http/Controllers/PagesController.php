<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // Get the three latest posts
        $latestPosts = Post::latest()->take(6)->get();

        // Pass the latest posts to the view
        return view('index', ['latestPosts' => $latestPosts]);
    }
}
