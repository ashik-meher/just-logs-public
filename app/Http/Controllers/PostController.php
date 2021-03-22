<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use DB;

class PostController extends Controller
{


    public function __construct(){

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::all();

        $posts = Post::orderBy('title', 'desc')->paginate(2);

        $context = [
            'posts' => $posts, 
        ];

        return view('posts.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);



        $post = new Post();

        $post->title = request('title');

        $post->body = request('body');

        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success', 'Your Post has just Logged ');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post = Post::where('id', $id)->first();
        $context = [
            'post' =>$post,
        ];

        return view('posts.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);

        //check for authorised user

        if (auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Unathorised Access');
        }

        $context = ['post'=>$post];

        return view('posts.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::find($id);

        $post->title = request('title');

        $post->body = request('body');

        $post->save();

        return redirect('posts')->with('success', 'Log has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);

        //i think we dont need this as the route does not exist explicitly

        if(auth()->user()->id !== $post->user_id)
           {
               return redirect('posts')->with('error', 'Unathorised Access');
           }

        $post->delete();

        return redirect('posts')->with('success', 'Log Has been removed');


    }


    public function userPosts (){

        $id = auth()->user()->id;

        $userPosts = Post::where('user_id', $id)->get();

        //$userPosts = DB::select("select * from posts where user_id=$id");

        $context = ['posts'=> $userPosts];

        //return $context;

        return view('posts.user-posts', $context);





    }
}
