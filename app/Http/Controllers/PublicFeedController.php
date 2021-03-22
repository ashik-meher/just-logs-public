<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PublicFeedController extends Controller
{
    //

    public function index(){

        $posts = Post::orderBy('id', 'desc')->paginate(2);

        return view('posts.public-feed')->with('posts', $posts);

    }
}
